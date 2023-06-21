<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Notification;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->get();
        return view('pages.web.order.main',compact('orders'));
    }
    public function cancelOrder($id)
    {
        $order = Order::find($id);
        $order->order_status = 'Cancelled';

        // Mengembalikan stok produk
        foreach ($order->orderItems as $orderItem) {
            $product = Product::findOrFail($orderItem->product_id);
            $product->product_stock += $orderItem->quantity;
            $product->save();
        }
        $notification = new Notification;
        $notification->user_id = 1;
        $notification->message = $user->name.' cancelled the order';
        $notification->type = 'success';
        $notification->order_number = $order->order_number;
        $notification->save();
        $order->save();
        $order->save();

        return redirect()->route('order.index')->with('success', 'Successfully canceled order');
    }
    public function show($id)
    {
        $item = Order::with('orderItems')->find($id);


        if ($item) {
            $orderItems = $item->orderItems;
            foreach ($orderItems as $orderItem) {
                $productName = $orderItem->product->product_name;
                $productPrice = $orderItem->product->product_price;
                // Perform actions with the fetched product data
            }
        }
        if($item->user_id == Auth::id()){

            if($item->order_status == "Unpaid"){
                // Set your Merchant Server Key
                \Midtrans\Config::  $serverKey = config('midtrans.server_key');
                // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
                \Midtrans\Config::$isProduction = true;
                // Set sanitization on (default)
                \Midtrans\Config::$isSanitized = true;
                // Set 3DS transaction for credit card to true
                \Midtrans\Config::$is3ds = true;

                $params = array(
                    'transaction_details' => array(
                        // 'order_id' => rand(),
                        'order_id' => rand(),
                        'gross_amount' => $item->order_amount,
                    ),
                    'custom_field1' => $item->order_number,
                    'customer_details' => array(
                        'email' => Auth::user()->email,
                    ),
                );
                $snapToken = \Midtrans\Snap::getSnapToken($params);
                return view('pages.web.order.show',compact('item', 'snapToken'));
            }
                return view('pages.web.order.show',compact('item'));
        }
        abort(404);
    }

    public function makeOrder(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'payment_method'=> 'required',
            'quantity' => 'required|int|min:1'
        ]);

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; // set karakter yang digunakan
        $order_number = 'QS' . substr(str_shuffle($characters), 0, 10);

        $order = new Order();
        $order->user_id = Auth::id();
        $order->order_number = $order_number;
        $order->order_amount = $product->product_price * $request->quantity;
        $order->order_status = 'Pending';
        $order->payment_method = $request->payment_method;
        $order->save();

        $orderItem = new OrderItem();
        $orderItem->order_id = $order->id;
        $orderItem->product_id = $product->id;
        $orderItem->quantity = $request->quantity;
        $orderItem->save();

        $notification = new Notification;
        $notification->user_id = 1;
        $notification->message = 'Anda mendapatkan Pesanan!, Kode ' . $order->code;
        $notification->type = 'success';
        $notification->order_number = $order_number;
        $notification->save();

        // return redirect()->route('product.index')->with('success', 'Order has been placed successfully');
        return response()->json([
            'success' => true,
            'redirectUrl' => route('product.index'),
            'message' => 'Order has been placed successfully'
        ]);
    }

    public function checkout(Request $request)
    {
        // Ambil data dari keranjang belanja
        $userId = Auth::id();
        $cart = session()->get('cart.'.$userId, []);

        // Buat data order baru
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; // set karakter yang digunakan
        $order_number = 'QS' . substr(str_shuffle($characters), 0, 10);

        $request->validate([
            'payment_method' =>'required',
        ]);
        $order = new Order();
        $order->user_id = $userId;
        if($request->payment_method == "Cash")
        {
            $order->order_status = 'Accepted';
        }
        if($request->payment_method == "Transfer")
        {
            $order->order_status = 'Unpaid';
        }
        $order->order_amount = 0;
        $order->order_number = $order_number;
        $order->payment_method = $request->payment_method;
        $order->save();

        $notification = new Notification;
        $notification->user_id = 1;
        $notification->message = 'Anda mendapatkan Pesanan!, Kode ' . $order->code;
        $notification->type = 'success';
        $notification->order_number = $order_number;
        $notification->save();

        $totalPrice = 0;

        // Looping untuk membuat data order_item dari data cart
        foreach ($cart as $cartItem) {
            $product = Product::find($cartItem['id']);

            if (!$product) {
                // jika produk tidak ditemukan, skip ke produk berikutnya
                continue;
            }

            $product->product_stock -= $cartItem['quantity'];
            $product->save();
            // Buat data order_item baru
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $product->id;
            $orderItem->quantity = $cartItem['quantity'];
            $orderItem->save();

            // Hitung total harga order
            $totalPrice += $product->product_price * $cartItem['quantity'];
        }

        // Update total harga order
        $order->order_amount = $totalPrice;
        $order->save();

        // Kosongkan keranjang belanja
        session()->forget('cart.'.$userId);

        return redirect()->route('cart.index')->with('success', 'Your order has been created');
    }

    public function callback(Request $request)
    {
        if ($request->has('custom_field1')) {
            $isOrder = strpos($request->custom_field1, 'QS') !== false;

            $serverKey = config('midtrans.server_key');
            $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

            if ($hashed == $request->signature_key) {
                if ($request->transaction_status == 'settlement') {
                    if ($isOrder) {
                        $order = Order::where('order_number', $request->custom_field1)->first();
                        if ($order) {
                            $order->update(['order_status' => 'Paid']);
                            $notification = new Notification;
                            $notification->user_id = 1;
                            $notification->message = 'The order has paid!';
                            $notification->type = 'info';
                            $notification->order_number = $order->order_number;
                            $notification->save();
                            return redirect()->route('order.index')->with('success', 'Your order has been paid');
                        } else {
                            return redirect()->route('order.index')->with('error', 'The payment encountered an error');
                        }
                    } else {
                        $booking = Booking::where('booking_code', $request->custom_field1)->first();
                        if ($booking) {
                            $booking->update(['status' => 'Paid']);
                            $notification = new Notification;
                            $notification->user_id = 1;
                            $notification->message = 'The booking has paid!';
                            $notification->type = 'info';
                            $notification->order_number = $booking->booking_code;
                            $notification->save();
                            return redirect()->route('booking.index')->with('success', 'Your booking has been paid');
                        } else {
                            return redirect()->route('booking.index')->with('error', 'The payment encountered an error');
                        }
                    }
                }
            }
        }
    }

}

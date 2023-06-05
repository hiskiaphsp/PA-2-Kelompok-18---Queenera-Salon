<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderItems')->get();

        foreach ($orders as $order) {
            $orderItems = $order->orderItems;
            foreach ($orderItems as $orderItem) {
                $productName = $orderItem->product->product_name;
                $productPrice = $orderItem->product->product_price;
                // Lakukan hal yang ingin dilakukan dengan data product yang sudah diambil
            }
        }

        return view('pages.web.order.main',compact('orders'));
    }
    public function cancelOrder($id){
        $order = Order::find($id);
        $order->order_status = 'Cancelled';
        $order->save();
        return redirect()->route('cart.index')->with('success', 'Successfully canceled order');
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

       if($item->order_status == "Unpaid"){
         // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $item->order_number,
                'gross_amount' => $item->order_amount,
            ),
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('pages.web.order.show',compact('item', 'snapToken'));
       }
        return view('pages.web.order.show',compact('item'));

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
        $orderItem->order_number = $order_number;
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
        $order->order_status = 'Pending'; // bisa diganti dengan status yang sesuai
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

            // Buat data order_item baru
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $product->id;
            $orderItem->quantity = $cartItem['quantity'];
            $orderItem->order_number = $order->order_number;
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

    public function callback(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$request->serverKey);
        // if($hashed == $request->signature_key){
            if ($request->transaction_status == 'capture') {
                $order = Order::where('order_number', $request->order_id)->first();
                if ($order) {
                    $order->update(['order_status' => 'Paid']);
                    // Pesanan berhasil diperbarui dengan status "Paid"
                    return redirect()->route('order.index')->with('success', 'Your order has been paid');
                }else
                {
                    return redirect()->route('order.index')->with('error', 'The payment is error');
                }
            }
        // }
    }

}

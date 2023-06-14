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
        $orders = Order::with('user')->get();
        return view('pages.web.order.main',compact('orders'));
    }
    public function cancelOrder($id){
        $order = Order::find($id);
        $order->order_status = 'Cancelled';
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
                \Midtrans\Config::$serverKey = config('midtrans.server_key');
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
        // dd($request->custom_field1);
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'settlement') {
                $order = Order::where('order_number', $request->custom_field1)->first();
                if ($order) {
                    $order->update(['order_status' => 'Paid']);
                    // Pesanan berhasil diperbarui dengan status "Paid"
                    $notification = new Notification;
                    $notification->user_id = 1;
                    $notification->message = 'Pesanan dengan kode Kode ' . $order->order_number;
                    $notification->type = 'info';
                    $notification->order_number = $order->order_number;
                    $notification->save();
                    return redirect()->route('order.index')->with('success', 'Your order has been paid');
                } else {
                    return redirect()->route('order.index')->with('error', 'The payment encountered an error');
                }
            } elseif ($request->transaction_status == 'pending') {
                $order = Order::where('order_number', $request->custom_field1)->first();
                if ($order) {
                    $order->update(['order_status' => 'Waiting']);
                    // Pesanan berhasil diperbarui dengan status "Pending"
                    $notification = new Notification;
                    $notification->user_id = 1;
                    $notification->message = 'Pesanan dengan kode ' . $order->order_number . ' sedang menunggu pembayaran';
                    $notification->type = 'info';
                    $notification->order_number = $order->order_number;
                    $notification->save();
                    return redirect()->route('order.index')->with('info', 'Your order is pending payment');
                } else {
                    return redirect()->route('order.index')->with('error', 'The payment encountered an error');
                }
            } elseif ($request->transaction_status == 'deny') {
                $order = Order::where('order_number', $request->custom_field1)->first();
                if ($order) {
                    $order->update(['order_status' => 'Denied']);
                    // Pesanan berhasil diperbarui dengan status "Denied"
                    $notification = new Notification;
                    $notification->user_id = 1;
                    $notification->message = 'Pembayaran untuk pesanan dengan kode ' . $order->order_number . ' ditolak';
                    $notification->type = 'error';
                    $notification->order_number = $order->order_number;
                    $notification->save();
                    return redirect()->route('order.index')->with('error', 'Payment for your order has been denied');
                } else {
                    return redirect()->route('order.index')->with('error', 'The payment encountered an error');
                }
            } elseif ($request->transaction_status == 'expire') {
                $order = Order::where('order_number', $request->custom_field1)->first();
                if ($order) {
                    $order->update(['order_status' => 'Expired']);
                    // Pesanan berhasil diperbarui dengan status "Expired"
                    $notification = new Notification;
                    $notification->user_id = 1;
                    $notification->message = 'Pembayaran untuk pesanan dengan kode ' . $order->order_number . ' telah kedaluwarsa';
                    $notification->type = 'error';
                    $notification->order_number = $order->order_number;
                    $notification->save();
                    return redirect()->route('order.index')->with('error', 'Payment for your order has expired');
                } else {
                    return redirect()->route('order.index')->with('error', 'The payment encountered an error');
                }
            } elseif ($request->transaction_status == 'cancel') {
                $order = Order::where('order_number', $request->custom_field1)->first();
                if ($order) {
                    $order->update(['order_status' => 'Canceled']);
                    // Pesanan berhasil diperbarui dengan status "Canceled"
                    $notification = new Notification;
                    $notification->user_id = 1;
                    $notification->message = 'Pesanan dengan kode ' . $order->order_number . ' telah dibatalkan';
                    $notification->type = 'error';
                    $notification->order_number = $order->order_number;
                    $notification->save();
                    return redirect()->route('order.index')->with('error', 'Your order has been canceled');
                } else {
                    return redirect()->route('order.index')->with('error', 'The payment encountered an error');
                }
            } else {
                // Tambahkan logika untuk penanganan status transaksi lainnya di sini
            }

        }
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Notification;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
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
        return view('pages.admin.order.main',compact('orders'));
    }

    public function delete($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect()->route('admin.order.index')->with('success','Successfully deleted order');
    }

    public function create()
    {
        $product = Product::all();
        return view('pages.admin.order.create', compact('product'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' =>'required|array',
            'product_id.*' => 'exists:product,id',
            'quantity' => 'required|array',
            'quantity.*' => 'integer|min:1',
        ]);

        $productIds = $validatedData['product_id'];
        $quantities = $validatedData['quantity'];

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; // set karakter yang digunakan
        $order_number = 'QS' . substr(str_shuffle($characters), 0, 10);

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->order_status = 'Accepted';
        $order->payment_method = 'Cash';
        $order->order_number = $order_number;
        $order->order_amount = $request->order_amount;
        $order->save();

        foreach ($productIds as $index => $productId) {
            $product = Product::findOrFail($productId);

            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $product->id;
            $orderItem->quantity = $quantities[$index];
            // $orderItem->total_price = $product->price * $quantities[$index];
            $orderItem->save();
        }

        return redirect()->route('admin.order.index')->with('success', 'Order created successfully');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $products = Product::all();

        return view('pages.admin.order.edit', compact('order', 'products'));
    }

    public function complete_order($id)
    {

        $order = Order::find($id);
        $userID = Order::where('order_number', $order->order_number)->first();
        $user = User::findOrFail($userID->user_id);
        $order->order_status = 'Completed';

        $notification = new Notification;
        $notification->user_id = $userID->user_id;
        $notification->message = $user->name.' order has been completed';
        $notification->type = 'success';
        $notification->order_number = $order->order_number;
        $notification->save();
        $order->save();
        return redirect()->route('admin.order.index')->with('success','Successfully updated status order');
    }
    public function cancel_order($id)
    {
        $order = Order::find($id);
        $userID = Order::where('order_number', $order->order_number)->first();
        $user = User::findOrFail($userID->user_id);
        $order->order_status = 'Cancelled';

        // Mengurangi stok produk
        foreach ($order->orderItems as $orderItem) {
            $product = Product::findOrFail($orderItem->product_id);
            $product->product_stock += $orderItem->quantity; // Tambahkan kembali kuantitas ke stok produk
            $product->save();
        }

        $notification = new Notification;
        $notification->user_id = $userID->user_id;
        $notification->message = $user->name.' your order cancelled by Admin';
        $notification->type = 'info';
        $notification->order_number = $order->order_number;
        $notification->save();
        $order->save();

        return redirect()->route('admin.order.index')->with('success', 'Successfully updated order status');
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_id' =>'required|array',
            'product_id.*' => 'exists:products,id',
            'quantity' => 'required|array',
            'quantity.*' => 'integer|min:1',
        ]);

        $productIds = $validatedData['product_id'];
        $quantities = $validatedData['quantity'];

        $order = Order::findOrFail($id);
        $order->order_amount = $request->order_amount;
        $order->save();

        // Delete existing order items
        $order->orderItems()->delete();

        foreach ($productIds as $index => $productId) {
            $product = Product::findOrFail($productId);

            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $product->id;
            $orderItem->quantity = $quantities[$index];
            // $orderItem->total_price = $product->price * $quantities[$index];
            $orderItem->save();
        }

        return redirect()->route('admin.order.index')->with('success', 'Order updated successfully');
    }
}

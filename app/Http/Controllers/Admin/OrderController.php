<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
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

    public function accept_order($id){
        $order = Order::findOrFail($id);
        if($order->payment_method == 'Transfer'){
            $order->order_status = 'Unpaid';
            $order->save();

            // dd($snapToken);
        }
        if ($order->payment_method == "Cash") {
            $order->order_status = 'Accepted';
            $order->save();
        }
        return redirect('admin/order');
    }

    public function reject_order($id){
        $order = Order::find($id);
        $order->order_status = 'Rejected';
        $order->save();
        return redirect('admin/order');
    }
    public function delete($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect('admin/order');
    }
}

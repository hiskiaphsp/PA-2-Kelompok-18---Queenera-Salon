<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class InvoiceController extends Controller
{
        public function show($id)
    {
        $order = Order::find($id);

        if ($order) {
            $orderItems = $order->orderItems;
            foreach ($orderItems as $orderItem) {
                $product = $orderItem->product;
                if ($product) {
                    $productName = $product->product_name;
                    $productPrice = $product->product_price;
                }
            }
        }
        return view('layouts.invoice.print',compact('order', 'orderItems'));
    }

}

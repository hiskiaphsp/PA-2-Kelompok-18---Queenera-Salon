<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Models\Order;

class InvoiceController extends Controller
{
    public function show($id)
    {
        $order = Order::find($id);

        if ($order) {
            $orderItems = $order->orderItems;
            $data = [
                'order' => $order,
                'orderItems' => $orderItems
            ];

            $pdf = new Dompdf();
            $html = view('layouts.invoice.print', $data)->render();
            $pdf->loadHtml($html);
            $pdf->setPaper('A4', 'portrait');
            $pdf->render();

            return $pdf->stream($order->order_number.'.pdf');
        }
    }

}

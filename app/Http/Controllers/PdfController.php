<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Booking;
use Dompdf\Dompdf;

class PdfController extends Controller
{
    public function invoicePdf($id)
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
    public function bookingPdf($id)
    {
        $booking = Booking::find($id);

        $pdf = new Dompdf();
        $html = view('layouts.invoice.booking', compact('booking'))->render();
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        return $pdf->stream($booking->booking_code.'.pdf');
    }
}

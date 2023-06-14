<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::whereIn('order_status', ['Completed', 'Cancelled', 'Rejected'])
            ->selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, order_status, COUNT(*) as total')
            ->groupBy('month', 'year', 'order_status')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        // Mengelompokkan data order berdasarkan bulan dan tahun
        $groupedOrders = $orders->groupBy(function ($item) {
            return date('F', mktime(0, 0, 0, $item->month, 1)) . ' ' . $item->year;
        });

        // Menginisialisasi array untuk data chart
        $chartData = [];

        // Membangun array data chart berdasarkan status order
        foreach ($groupedOrders as $key => $group) {
            $data = [
                'month' => $key,
            ];

            $cancelledAndRejected = $group->filter(function ($item) {
                return $item->order_status === 'Cancelled' || $item->order_status === 'Rejected';
            });

            $data['Completed'] = $group->where('order_status', 'Completed')->sum('total');
            $data['Cancelled/Rejected'] = $cancelledAndRejected->sum('total');

            $chartData[] = $data;
        }

        $bookings = Booking::whereIn('status', ['Completed', 'Cancelled', 'Rejected'])
            ->selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, status, COUNT(*) as total')
            ->groupBy('month', 'year', 'status')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        // Mengelompokkan data booking berdasarkan bulan dan tahun
        $groupedBookings = $bookings->groupBy(function ($item) {
            return date('F', mktime(0, 0, 0, $item->month, 1)) . ' ' . $item->year;
        });

        // Menginisialisasi array untuk data chart
        $chartBookingData = [];

        // Membangun array data chart berdasarkan status booking
        foreach ($groupedBookings as $key => $group) {
            $data = [
                'month' => $key,
            ];

            $cancelledAndRejected = $group->filter(function ($item) {
                return $item->status === 'Cancelled' || $item->status === 'Rejected';
            });

            $data['Cancelled/Rejected'] = $cancelledAndRejected->sum('total');
            $data['Completed'] = $group->where('status', 'Completed')->sum('total');

            $chartBookingData[] = $data;
        }

        $totalUser = User::count();
        $totalOrder = Order::count();
        $totalOrderComplete = Order::where('order_status', 'Completed')->count();
        $totalBookingComplete = Booking::where('status', 'Completed')->count();
        $totalAmount = Order::where('order_status', 'Completed')->sum('order_amount');

        $amounts = Order::where('order_status', 'Completed')
            ->selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, SUM(order_amount) as total_amount')
            ->groupBy('month', 'year')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        $amountData = [];

        foreach ($amounts as $order) {
            $monthYear = Carbon::createFromDate($order->year, $order->month)->format('F Y');
            $amountData[] = [
                'x' => $monthYear,
                'y' => $order->total_amount,
            ];
        }

        return view('pages.admin.dashboard.main', compact('totalUser', 'totalOrder', 'totalOrderComplete', 'totalAmount', 'chartData', 'chartBookingData', 'totalBookingComplete', 'amountData'));
    }
}


<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
class DashboardController extends Controller
{
    public function index()
    {   
        $totalUser = User::count();
        $totalOrder = Order::count();
        $totalOrderComplete = Order::where('order_status', 'Completed')->count();
        $totalAmount = Order::where('order_status', 'Completed')->sum('order_amount');
        return view('pages.admin.dashboard.main', compact('totalUser', 'totalOrder', 'totalOrderComplete', 'totalAmount'));
    }
}

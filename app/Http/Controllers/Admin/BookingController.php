<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $booking = Booking::join('services', 'booking.service_id', '=', 'services.id')
                    ->join('users', 'booking.user_id', '=', 'users.id')
                    ->select('booking.*', 'services.service_name')
                    ->get();
        return view('pages.admin.booking.main',compact('booking'));
    }
    public function accept_booking($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'Accepted';
        $booking->save();

        return redirect('admin/booking');
    }

    public function reject_booking($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'Rejected';
        $booking->save();

        return redirect('admin/booking');
    }
    public function delete($id)
    {
        $booking = Booking::find($id);
        $booking->delete();

        return redirect('admin/booking');
    }
}

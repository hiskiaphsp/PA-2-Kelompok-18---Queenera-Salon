<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
        $booking = Booking::findOrFail($id);
        $userID = Booking::where('booking_code', $booking->booking_code)->first();
        $user = User::findOrFail($userID->user_id);
        if ($booking->payment_method == "Transfer") {
            $booking->status = "Unpaid";
        }
        if ($booking->payment_method == "Cash") {
            $booking->status = "Accepted";
        }
        $booking->save();

        $notification = new Notification;
        $notification->user_id = $userID->user_id;
        $notification->message = $user->name.' your booking accepted by Admin';
        $notification->type = 'success';
        $notification->order_number = $booking->booking_code;
        $notification->save();


        return redirect()->route('admin.booking.index')->with('success','Successfully updated status booking');
    }
    public function delete($id)
    {
        $booking = Booking::find($id);
        $booking->delete();

        return redirect()->route('admin.booking.index')->with('success','Successfully deleted booking');
    }

    public function create()
    {
        $services = Service::all();
        $users = User::all();
        return view('pages.admin.booking.create', compact('services', 'users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'service_id' => 'required',
            'user_id' => '',
            'phone_number' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^62/', $value)) {
                        $fail('Phone number must start with "62".');
                    }
                },
                function ($attribute, $value, $fail) {
                    if (strlen($value) < 11) {
                        $fail('Phone number must have at least 11 characters.');
                    }
                },
            ],
            'start_booking_date' => [
                'required',
                function ($attribute, $value, $fail) {
                    $startBooking = Carbon::createFromFormat('m/d/Y h:i A', $value);

                    $existingBooking = Booking::where('start_booking_date', '<=', $startBooking)
                        ->where('end_booking_date', '>', $startBooking)
                        ->where('status', 'Accepted')
                        ->first();

                    if ($existingBooking) {
                        $fail('The selected start booking date conflicts with an existing booking.');
                    }
                },
            ],
            'end_booking_date' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    $endBooking = Carbon::createFromFormat('m/d/Y h:i A', $value);

                    $existingBooking = Booking::where('start_booking_date', '<', $endBooking)
                        ->where('end_booking_date', '>=', $endBooking)
                        ->where('status', 'Accepted')
                        ->first();

                    if ($existingBooking) {
                        $fail('The selected end booking date conflicts with an existing booking.');
                    }
                },
                'after:start_booking_date',
            ],
            'payment_method' => '',
            'status' => '',
            'booking_code' => '',
            'booking_description' => '',
        ]);
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; // set karakter yang digunakan
        $booking_code = 'BK-' . substr(str_shuffle($characters), 0, 6); // generate 6 karakter acak dari kombinasi karakter yang ditentukan

        $validatedData['user_id'] = Auth::id();
        $validatedData['booking_code'] = $booking_code;
        $validatedData['status'] = 'Accepted';
        $validatedData['payment_method'] = 'Cash';
        $validatedData['start_booking_date'] = Carbon::createFromFormat('m/d/Y h:i A',$request->start_booking_date);
        $validatedData['end_booking_date'] = Carbon::createFromFormat('m/d/Y h:i A',$request->end_booking_date);
        Booking::create($validatedData);

        return redirect()->route('admin.booking.index')->with('success', 'Booking created successfully.');
    }

    public function edit($id)
    {
        $services = Service::all();
        $booking = Booking::findOrFail($id);

        return view('pages.admin.booking.edit', compact('booking', 'services'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'service_id' => 'required',
            'user_id' => '',
            'phone_number' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^62/', $value)) {
                        $fail('Phone number must start with "62".');
                    }
                },
                function ($attribute, $value, $fail) {
                    if (strlen($value) < 11) {
                        $fail('Phone number must have at least 11 characters.');
                    }
                },
            ],
            'start_booking_date' => [
                'required',
                function ($attribute, $value, $fail) {
                    $startBooking = Carbon::createFromFormat('m/d/Y h:i A', $value);

                    $existingBooking = Booking::where('start_booking_date', '<=', $startBooking)
                        ->where('end_booking_date', '>', $startBooking)
                        ->where('status', 'Accepted')
                        ->first();

                    if ($existingBooking) {
                        $fail('The selected start booking date conflicts with an existing booking.');
                    }
                },
            ],
            'end_booking_date' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    $endBooking = Carbon::createFromFormat('m/d/Y h:i A', $value);

                    $existingBooking = Booking::where('start_booking_date', '<', $endBooking)
                        ->where('end_booking_date', '>=', $endBooking)
                        ->where('status', 'Accepted')
                        ->first();

                    if ($existingBooking) {
                        $fail('The selected end booking date conflicts with an existing booking.');
                    }
                },
                'after:start_booking_date',

            ],
            'payment_method' => '',
            'status' => '',
            'booking_code' => '',
            'booking_description' => '',
        ]);
        $booking = Booking::findOrFail($id);
        $validatedData['user_id'] = Auth::id();
        $validatedData['status'] = 'Accepted';
        $validatedData['payment_method'] = 'Cash';
        $validatedData['start_booking_date'] = Carbon::createFromFormat('m/d/Y h:i A',$request->start_booking_date);
        $validatedData['end_booking_date'] = Carbon::createFromFormat('m/d/Y h:i A',$request->end_booking_date);
        $booking->update($validatedData);

        return redirect()->route('admin.booking.index')->with('success', 'Booking updated successfully.');
    }

    public function complete_booking($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'Completed';
        $booking->save();

        return redirect()->route('admin.booking.index')->with('success','Successfully updated status booking');
    }
    public function cancel_booking($id)
    {
        $booking = Booking::findOrFail($id);
        $userID = Booking::where('booking_code', $booking->booking_code)->first();
        $user = User::findOrFail($userID->user_id);

        $booking->status = 'Cancelled';
        $booking->save();

        $notification = new Notification;
        $notification->user_id = $userID->user_id;
        $notification->message = $user->name.' your booking cancelled by Admin';
        $notification->type = 'info';
        $notification->order_number = $booking->booking_code;
        $notification->save();

        return redirect()->route('admin.booking.index')->with('success','Successfully updated status booking');
    }

}

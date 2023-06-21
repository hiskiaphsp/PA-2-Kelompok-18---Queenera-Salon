<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $bookings = Booking::join('services', 'booking.service_id', '=', 'services.id')
            ->join('users', 'booking.user_id', '=', 'users.id')
            ->where('booking.user_id', $user->id)
            ->select('booking.*', 'services.service_name', 'services.service_price')
            ->paginate(10);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = true;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $snapTokens = [];

        foreach ($bookings as $booking) {
            if ($booking->status == 'Unpaid') {
                $params = array(
                    'transaction_details' => array(
                        'order_id' => rand(),
                        'gross_amount' => $booking->service_price,
                    ),
                    'custom_field1' => $booking->booking_code,
                    'customer_details' => array(
                        'email' => $user->email,
                    ),
                );
                $snapToken = \Midtrans\Snap::getSnapToken($params);
                $snapTokens[$booking->id] = $snapToken;
            }
        }

        return view('pages.web.booking.main', compact('bookings', 'snapTokens'));
    }


    public function create()
    {
        $service = Service::all();
        return view('pages.web.booking.create', new Booking, compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
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
        $notification = new Notification;
        $notification->user_id = 1;
        $notification->message = Auth::user()->name.' makes booking! ' . $booking_code;
        $notification->type = 'success';
        $notification->order_number = $booking_code;
        $notification->save();

        $booking = new Booking();
        $booking->username=$request->username;
        $booking->service_id= $request->service_id;
        $booking->user_id = Auth::user()->id;
        $booking->phone_number = $request->phone_number;
        $booking->start_booking_date = Carbon::createFromFormat('m/d/Y h:i A',$request->start_booking_date);
        $booking->end_booking_date = Carbon::createFromFormat('m/d/Y h:i A',$request->end_booking_date);
        $booking->payment_method = $request->payment_method;
        $booking->booking_code = $booking_code;
        if ($request->payment_method == "Transfer") {
            $booking->status = "Unpaid";
        }
        if ($request->payment_method == "Cash") {
            $booking->status = "Accepted";
        }
        $booking->booking_description = $request->booking_description;
        $booking->save();

        return redirect()->route('booking.index')->with('success', 'Your bookings have been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        $service = Service::all();
        return view('pages.web.booking.update', compact('booking', 'service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
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
            'payment_method' => 'required',
            'status' => '',
            'booking_code' => '',
            'booking_description' => '',
        ]);
        $booking = Booking::find($id);
        $booking->username=$request->username;
        $booking->service_id= $request->service_id;
        $booking->phone_number = $request->phone_number;
        $booking->start_booking_date = Carbon::createFromFormat('m/d/Y h:i A',$request->start_booking_date);
        $booking->end_booking_date = Carbon::createFromFormat('m/d/Y h:i A',$request->end_booking_date);
        $booking->booking_description = $request->booking_description;
        if ($request->payment_method == "Transfer") {
            $booking->status = "Unpaid";
        }
        if ($request->payment_method == "Cash") {
            $booking->status = "Accepted";
        }
        $booking->save();

        return redirect()->route('booking.index')->with('success', 'Your bookings have been updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }

    public function cancel_booking($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'Cancelled';
        $booking->save();

        return redirect()->route('booking.index')->with('success', 'Your bookings have been cancelled');
    }



}

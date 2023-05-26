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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $service;

    public function __construct()
    {
        $this->service = Service::all();
    }
    public function index()
    {
        $user = auth()->user();
        $booking = Booking::join('services', 'booking.service_id', '=', 'services.id')
                    ->join('users', 'booking.user_id', '=', 'users.id')
                    ->where('booking.user_id', $user->id)
                    ->select('booking.*', 'services.service_name')
                    ->paginate(10);
        return view('pages.web.booking.main',compact('booking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.web.booking.create', new Booking)->with('service', $this->service);
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
            'username'=> 'required',
            'service_id'=>'required',
            'phone_number'=>'required|numeric',
            'start_booking_date'=>'required',
            'end_booking_date'=>'required',
            'payment_method'=>'required',
        ]);
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; // set karakter yang digunakan
        $booking_code = 'QS-' . substr(str_shuffle($characters), 0, 6); // generate 6 karakter acak dari kombinasi karakter yang ditentukan

        $booking = new Booking();
        $booking->username=$request->username;
        $booking->service_id= $request->service_id;
        $booking->user_id = Auth::user()->id;
        $booking->phone_number = $request->phone_number;
        $booking->start_booking_date = Carbon::createFromFormat('m/d/Y h:i A',$request->start_booking_date);
        $booking->end_booking_date = Carbon::createFromFormat('m/d/Y h:i A',$request->end_booking_date);
        $booking->payment_method = 'Cash';
        $booking->booking_code = $booking_code;
        $booking->booking_description = $request->booking_description;
        $booking->save();

        $notification = new Notification;
        $notification->user_id = 1;
        $notification->message = Auth::user()->name.' makes booking! ' . $booking_code;
        $notification->type = 'success';
        $notification->order_number = $booking_code;
        $notification->save();

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
            'username'=> 'required',
            'service_id'=>'required',
            'phone_number'=>'required|numeric',
            'start_booking_date'=>'required',
            'end_booking_date'=>'required',
            'payment_method'=>'required',
        ]);
        $booking = Booking::find($id);
        $booking->username=$request->username;
        $booking->service_id= $request->service_id;
        $booking->phone_number = $request->phone_number;
        $booking->start_booking_date = Carbon::createFromFormat('m/d/Y h:i A',$request->start_booking_date);
        $booking->end_booking_date = Carbon::createFromFormat('m/d/Y h:i A',$request->end_booking_date);
        $booking->payment_method = $request->payment_method;
        $booking->booking_description = $request->booking_description;
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

<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Rating;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'order_item_id' => '',
            'product_rate' => 'required',
            'type' => '',
            'description' => '',
        ]);
        $validatedData['order_item_id'] = $id;
        $validatedData['type'] = 'Product';
        Rating::create($validatedData);

        return back()->with('success', 'Successfully rated product');

    }
    public function store_service(Request $request, $id)
    {
        $validatedData = $request->validate([
            'booking_id' => '',
            'product_rate' => 'required',
            'type' => '',
            'description' => '',
        ]);
        $validatedData['booking_id'] = $id;
        $validatedData['type'] = 'Service';
        Rating::create($validatedData);

        return redirect()->route('booking.index')->with('success', 'Successfully rated service');

    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_rate' => 'required',
            'description' => '',
        ]);

        $rating = Rating::find($id);

        if (!$rating) {
            return back()->with('error', 'Rating not found');
        }

        $rating->product_rate = $validatedData['product_rate'];
        $rating->description = $validatedData['description'];
        $rating->update();

        return redirect()->route('order.index')->with('success', 'Successfully updated rate');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

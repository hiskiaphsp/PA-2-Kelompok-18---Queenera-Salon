<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.service.main', ['service'=>Service::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.service.create', ['data'=>new Service]);
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
            'service_name' =>'required',
            'service_image' =>'required|mimes:jpeg,png,jpg,gif,svg',
            'service_description' =>'',
            'service_price' =>'required|numeric',
        ]);

        if($request->hasfile('service_image'))
         {

            $file = $request->file('service_image');
            $namaFile = time().$file->getClientOriginalName();
            $tujuanFile = 'images';

            $file->move($tujuanFile, $namaFile);

            $newservice = new service;
            $newservice->service_name = $request->service_name;
            $newservice->service_image = $namaFile;
            $newservice->service_description = $request->service_description;
            $newservice->service_price = $request->service_price;
         }


        //  dd(request()->all());
        $newservice->save();

        return redirect()->route('admin.service.index')->with('success','Successfully added service');
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
    public function edit(Service $service)
    {
        return view('pages.admin.service.update', compact('service'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $service)
    {
         $request->validate([
            'service_name' =>'required',
            'service_image' =>'mimes:jpeg,png,jpg,gif,svg',
            'service_description' =>'',
            'service_price' =>'required|numeric',
        ]);
        if($request->hasfile('service_image')){
            $file = $request->file('service_image');
            $namaFile = time().$file->getClientOriginalName();
            $tujuanFile = 'images';

            $file->move($tujuanFile, $namaFile);

            service::where('id',$service)->update([
                'service_name' => $request->service_name,
                'service_image' => $namaFile,
                'service_description' => $request->service_description,
                'service_price' => $request->service_price,
            ]);
        }else{
            service::where('id',$service)->update([
                'service_name' => $request->service_name,
                'service_description' => $request->service_description,
                'service_price' => $request->service_price,
            ]);
        }
        return redirect()->route('admin.service.index')->with('success','Successfully updated service');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $file_path = public_path('images/'.$service->service_image);
        unlink($file_path);
        // dd(request()->all())
        $service->delete();
        return redirect()->route('admin.service.index')->with('success','Successfully deleted service');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.product.main', ['product'=>Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.product.create', ['data'=>new Product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' =>'required',
            'product_code' =>'required|min:6|unique:product',
            'product_image' =>'required|mimes:jpeg,png,jpg,gif,svg',
            'product_description' =>'',
            'product_price' =>'required|numeric',
            'product_stock' =>'required|numeric|',
        ]);

        if($request->hasfile('product_image'))
         {

            $file = $request->file('product_image');
            $namaFile = time()."_".$file->getClientOriginalName();
            $tujuanFile = 'images';

            $file->move($tujuanFile, $namaFile);

            $newProduct = new Product;
            $newProduct->product_name = $request->product_name;
            $newProduct->product_code= $request->product_code;
            $newProduct->product_image = $namaFile;
            $newProduct->product_description = $request->product_description;
            $newProduct->product_price = $request->product_price;
            $newProduct->product_stock = $request->product_stock;
         }


        //  dd(request()->all());
        $newProduct->save();

        return redirect()->route('admin.product.index')->with('success', 'Successfully Added Product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('pages.admin.product.update', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product)
    {
        $request->validate([
            'product_name' =>'required',
            'product_code' =>'required|min:6',
            'product_image' =>'mimes:jpeg,png,jpg,gif,svg',
            'product_description' =>'',
            'product_price' =>'required|numeric',
            'product_stock' =>'required|numeric',
        ]);
        if($request->hasfile('product_image')){
            $file = $request->file('product_image');
            $namaFile = time().$file->getClientOriginalName();
            $tujuanFile = 'images';

            $file->move($tujuanFile, $namaFile);

            Product::where('id',$product)->update([
                'product_name' => $request->product_name,
                'product_code'=> $request->product_code,
                'product_image' => $namaFile,
                'product_description' => $request->product_description,
                'product_price' => $request->product_price,
                'product_stock' => $request->product_stock,
            ]);
        }else{
            Product::where('id',$product)->update([
                'product_name' => $request->product_name,
                'product_code'=> $request->product_code,
                'product_description' => $request->product_description,
                'product_price' => $request->product_price,
                'product_stock' => $request->product_stock,
            ]);
        }
        return redirect()->route('admin.product.index')->with('success','Successfully updated product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $file_path = public_path('images/'.$product->product_image);
        unlink($file_path);
        $product->delete();
        return redirect()->route('admin.product.index')->with('success','Successfully deleted product');

    }
}

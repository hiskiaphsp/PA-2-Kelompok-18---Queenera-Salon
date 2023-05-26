<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\VSE;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userId = Auth::id();
        $cart = session()->get('cart', []);
        $keyword = $request->input('keyword');

        if ($keyword) {
            $products = Product::where('product_name', 'like', '%' . $keyword . '%')
                ->latest()
                ->paginate(9);
        } else {
            $products = Product::latest()->paginate(9);
        }

        return view('pages.web.product.main', compact('cart', 'products'));
    }



    public function loadCart()
    {
        $userId = Auth::id();
        $cart = Session::get('cart.' . $userId, []);
        $total = 0;

        $cartDetails = view('pages.web.home.cart-loader')->with(compact('cart'))->render();

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $cartSubtotal = "Rp. " . number_format($total, 2, ',', '.');

        $response = [
            'cart_details' => $cartDetails,
            'cart_subtotal' => $cartSubtotal
        ];

        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $products = Product::all();
        return view('pages/web/product/show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);
        $userId = Auth::id();

        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Product not found.'], 404);
        }

        $cart = session()->get('cart.'.$userId, []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->product_name,
                'price' => $product->product_price,
                'quantity' => $quantity,
                'image' => $product->product_image,
                'user_id' => $userId,
            ];
        }

        session()->put('cart.'.$userId, $cart);

        return response()->json(['message' => 'Product added to cart.'], 200);
    }
    public function removeFromCart(Request $request)
    {
        $productId = $request->input('product_id');
        $userId = Auth::id();

        $cart = session()->get('cart.'.$userId, []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart.'.$userId, $cart);

            return back();
        }

        return back();
    }
    public function checkout_product(Request $request)
    {
        // Ambil data dari keranjang belanja
        $userId = Auth::id();
        $cart = session()->get('cart.'.$userId, []);

        // Buat data order baru
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; // set karakter yang digunakan
        $order_number = 'QS' . substr(str_shuffle($characters), 0, 14);

        $order = new Order();
        $order->user_id = $userId;
        $order->order_status = 'Pending'; // bisa diganti dengan status yang sesuai
        $order->order_amount = 0;
        $order->order_number = $order_number;
        $order->save();

        $totalPrice = 0;

        // Looping untuk membuat data order_item dari data cart
        foreach ($cart as $cartItem) {
            $product = Product::find($cartItem['id']);

            if (!$product) {
                // jika produk tidak ditemukan, skip ke produk berikutnya
                continue;
            }

            // Buat data order_item baru
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $product->id;
            $orderItem->quantity = $cartItem['quantity'];
            $orderItem->order_number = $order->order_number;
            $orderItem->save();

            // Hitung total harga order
            $totalPrice += $product->product_price * $cartItem['quantity'];
        }

        // Update total harga order
        $order->order_amount = $totalPrice;
        $order->save();

        // Kosongkan keranjang belanja
        session()->forget('cart.'.$userId);

        return redirect()->route('order.index')->with('success', 'You successfully checkout the order');
    }

}



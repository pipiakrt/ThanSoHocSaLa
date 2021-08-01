<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('san-pham', compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('chi-tiet-san-pham', compact('product'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function themsanpham(Request $request, $slug)
    {
        $user = $request->user();
        $product = Product::where('slug', $slug)->first();
        if ($product) {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $product->id
            ]);
            return redirect('/tai-khoan/gio-hang/');
        }
        return view('errors.404');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;

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
            $check = Cart::where('product_id', $product->id)->first();
            if (!$check) {
                Cart::create([
                    'user_id' => $user->id,
                    'product_id' => $product->id
                ]);
            }
            return redirect('/tai-khoan/gio-hang/');
        }
        return view('errors.404');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dathang(Request $request, $id)
    {
        $user = $request->user();
        $cart = $user->Cart->find($id);
        if ($cart) {
            try {
                Order::create([
                    'user_id' => $user->id,
                    'product_id' => $cart->Product->id,
                    'avatar' => $cart->Product->image,
                    'code' => $user->id . mt_rand(1000000000, 9999999999),
                    'name' => $cart->Product->name,
                    'phone' => $user->phone,
                    'email' => $user->email,
                    'price' => $cart->Product->price,
                ]);
            } catch (\Throwable $th) {
                return redirect('/tai-khoan/don-hang/');
            }
        }
        $cart->delete();
        return redirect('/tai-khoan/don-hang/');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function xoasanpham(Request $request, $id)
    {
        Cart::find($id)->delete();
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Session::get('cart.products');
        $total = 0;
        if ($products) {
            foreach ($products as $item) {
                if ($item["status"] == true) {
                    $price = Str::replace('.', '', $item["price"]);
                    $total += (int) (string) Str::of($price)->before(' VNĐ');
                }
            }
        }
        return view('gio-hang', compact(['products', 'total']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($slug)
    {
        $products = Session::get('cart.products');
        $product = Product::where('slug', $slug)->get()->toArray()[0];

        if (!$products) {
            Session::push("cart.products", $product);
            return redirect('/gio-hang');
        }
        else {
            foreach ($products as $item) {
                if ($item['slug'] == $slug) {
                    return redirect('/gio-hang');
                }
            }
            Session::push("cart.products", $product);
            return redirect('/gio-hang');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dathang(Request $request)
    {
        $products = Session::get('cart.products');
        $user = $request->user();
        return view('thanh-toan', compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TuVan  $tuVan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $products = Session::get('cart.products');
        Session::forget('cart.products');

        foreach ($products as $item) {
            if ($item["slug"] == $slug) {
                $item["status"] = !$item["status"];
            }
            Session::push("cart.products", $item);
        }
        return redirect('/gio-hang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Session::get('cart.products');
        Session::forget('cart.products');

        $carts = collect($products)->filter(function ($value) use ($id) {
            return $value["id"] != $id;
        });

        foreach ($carts as $item) {
            Session::push("cart.products", $item);
        }

        return redirect('/gio-hang');
    }
}

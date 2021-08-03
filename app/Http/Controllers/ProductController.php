<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

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
    public function dathang(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->first();
        $user = $request->user();
        $check = $user->Order->where('product_id', $product->id)->first();
        if (!$check) {
            Order::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'avatar' => $product->image,
                'code' => $user->id . mt_rand(1000000000, 9999999999),
                'name' => $product->name,
                'phone' => $user->phone,
                'email' => $user->email,
                'price' => $product->price,
            ]);
            return redirect('/tai-khoan/gio-hang/')->with('msg', 'Thêm gói sản phẩm thành công, thanh toán để kích hoạt gói!');
        }
        else if ($check->status == 1) {
            return redirect('/tai-khoan/dich-vu/')->with('msg', 'Gói sản phẩm đang hoạt động, liên hệ 0987654321 để nâng cấp gói');
        }
        else if ($check->status == 0) {
            return redirect('/tai-khoan/gio-hang/')->with('msg', 'Gói sản phẩm đã có trong giỏ hàng, thanh toán để kích hoạt gói!');
        }
        else {
            return redirect('/tai-khoan/gio-hang/')->with('msg', 'Gói sản phẩm đã hết hạn, nhấn gia hạn hoạc liên hệ 0987654321 để gia hạn gói!');
        }
    }
}

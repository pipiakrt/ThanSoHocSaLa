<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Jobs\Order as sendMail;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('status', 1)->take(2)->get();
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
        $product = Product::where(['status' => 1, 'slug' => $slug])->first();
        return view('chi-tiet-san-pham', compact(['product']));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function thanhtoan(Request $request)
    {
        $diachi = '';

        if($request->payment == "Ship COD") {
            $address = Province::find($request->province);
            $province = $address->name;
            $district = $address->districts->find($request->district)->name;
            $ward = $address->districts->find($request->district)->wards->find($request->ward)->name;
            $diachi = $province . ' - ' . $district . ' - ' . $ward . '. Chi Tiết: ' . $request->address;
        }

        $products = Session::get('cart.products');
        Session::forget('cart.products');
        $user = $request->user();

        foreach ($products as $item) {
            if ($item["status"] == true) {
                $order = Order::create([
                    'province_id' => $request->province,
                    'user_id' => $user->id,
                    'product_id' => $item["id"],
                    'avatar' => $item["image"],
                    'code' => $user->id . mt_rand(1000000000, 9999999999),
                    'name' => $request->name,
                    'product_name' => $item["name"],
                    'address' => $diachi,
                    'note' => $request->note,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'price' => $item["price"],
                    'payment' => $request->payment
                ]);
                sendMail::dispatch($order);
            }
            else {
                Session::push("cart.products", $item);
            }
        }

        return redirect("/tai-khoan/ket-qua-thanh-toan/$order->code");
    }
}

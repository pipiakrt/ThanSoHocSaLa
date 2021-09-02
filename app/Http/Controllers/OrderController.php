<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\Order as sendMail;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use Illuminate\Support\Facades\Session;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nhapdiachi(Request $request)
    {
        return view("thanh-toan-no-user");
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

        if ($products) {
            foreach ($products as $item) {
                if ($item["status"] == true) {
                    $order = Order::create([
                        'product_id' => $item["id"],
                        'avatar' => $item["image"],
                        'code' => mt_rand(1000000000, 9999999999),
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
        }
        return redirect("/gio-hang")->with("success", "Cảm ơn bạn đã đặt hàng tại Thần số học sala, chúng tôi sẽ liên hệ bạn sớm nhất để tiến hành xác minh và kích hoạt đơn hàng.");
    }
}

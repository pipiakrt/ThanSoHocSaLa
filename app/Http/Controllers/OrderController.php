<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\Order as sendMail;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Requests\OrderCreateUser;
use App\Jobs\sendPassword as NotificationUser;

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
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function registerUser(array $data)
    {
        $password = Str::random(8);
        $user = User::create([
            'birthdate' => $data['birthdate'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($password),
        ]);
        NotificationUser::dispatch($user, $password);
        return $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function thanhtoan(OrderCreateUser $request)
    {
        $user = $this->registerUser($request->all());

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
        }
        return redirect("/ket-qua-thanh-toan");
    }

    public function ketquathanhtoan() {
        return view('ket-qua-thanh-toan');
    }
}

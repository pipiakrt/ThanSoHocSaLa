<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Province;
use App\Jobs\successOrder;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Order as Model;
use App\Jobs\Order as sendMail;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Api\Auth\Register2;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Order as Resources;
use App\Jobs\sendPassword as NotificationUser;

class OrderController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Model::class);
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Resources::collection(Model::paginateFilter($request));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Model $order)
    {
        return new Resources($order);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Register2 $request)
    {
        $user = $this->registerUser($request->all());

        $diachi = '';

        if($request->payment == "Ship COD") {
            $address = Province::find($request->province_id);
            $province = $address->name;
            $district = $address->districts->find($request->district_id)->name;
            $ward = $address->districts->find($request->district_id)->wards->find($request->ward_id)->name;
            $diachi = $province . ' - ' . $district . ' - ' . $ward . '. Chi Tiết: ' . $request->address;
        }

        $product = Product::find($request->product_id);

        $order = Model::create([
            'province_id' => $request->province_id,
            'user_id' => $user->id,
            'mkt_id' => $request->mkt_id,
            'sale_id' => $request->sale_id,
            'lendon_id' => request()->user()->id,
            'product_id' => $product["id"],
            'avatar' => $product["image"],
            'code' => $user->id . mt_rand(1000000000, 9999999999),
            'name' => $request->name,
            'product_name' => $product["name"],
            'address' => $diachi,
            'note' => $request->note,
            'phone' => $request->phone,
            'email' => $request->email,
            'price' => $product["price"],
            'payment' => $request->payment
        ]);
        sendMail::dispatch($order);
        return "ok";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Model $order)
    {
        if (($order->status == 0 || $order->status == 1) && $request->status == 2) {
            successOrder::dispatch($order);
            $product = Product::find($order->product_id);
            $user = User::find($order->user_id);
            $user->License->update(['number' => ($product->number + $user->License->number)]);
        }
        return $order->update($request->all());
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
            'phone' => $data['phone'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($password),
        ]);
        NotificationUser::dispatch($user, $password);
        return $user;
    }
}

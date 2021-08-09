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
        $groupProduct = [
            [
                [
                    "name" => "GÓI 1 CÁ NHÂN",
                    "title" => [
                        "MỘT LẦN MẤT KIỂM SOÁT",
                        "ĐÁNH MẤT HẠNH PHÚC CẢ CUỘC ĐỜI",
                        "Nóng giận - Đổ lỗi - Phán xét - Chê bai",
                    ],
                    "description" => [
                        [
                            "avatar" => "https://w.ladicdn.com/s650x900/60bf1c0b1a02f2001216e7d5/landingpage-level10-2-20210715120101.png",
                            "title" => [
                                "ĐÁNH MẤT SỰ PHÁT TRIỂN DOANH",
                                "NGHIỆP VÌ KHÔNG BIẾT CÁCH",
                                "ĐIỀU PHỐI NHÂN SỰ",
                            ],
                            "description" => [
                                "Bảo thủ, chỉ trích, xu nịnh, sếp nói sao nghe vậy",
                                "Đánh giá thấp người có năng lực, không thường xuyên trao đổi",
                                "Đề cao chủ nghĩa cá nhân và lan truyền cảm xúc tiêu cưc"
                            ]
                        ]
                    ]
                ]
            ]
        ];

        $product = Product::where('slug', $slug)->first();
        if ($product) {
            return view('chi-tiet-san-pham', compact('product'));
        }
        return view('errors.404');
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
            return view('thanh-toan', compact(['user', 'product']));
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function thanhtoan(Request $request, $slug)
    {
        $diachi = '';

        if($request->payment == "Ship COD") {
            $address = Province::find($request->province);
            $province = $address->name;
            $district = $address->districts->find($request->district)->name;
            $ward = $address->districts->find($request->district)->wards->find($request->ward)->name;
            $diachi = $province . ' - ' . $district . ' - ' . $ward . '. Chi Tiết: ' . $request->address;
        }

        $product = Product::where('slug', $slug)->first();
        $user = $request->user();

        $check = $user->Order->where('product_id', $product->id)->first();
        if (!$check) {
            $order = Order::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'avatar' => $product->image,
                'code' => $user->id . mt_rand(1000000000, 9999999999),
                'name' => $request->name,
                'product_name' => $product->name,
                'address' => $diachi,
                'note' => $request->note,
                'phone' => $request->phone,
                'email' => $request->email,
                'price' => $product->price,
                'payment' => $request->payment
            ]);
            sendMail::dispatch($order);
            return redirect('/tai-khoan/gio-hang/')->with('msg', 'Đặt hàng hoàn tất, hệ thống đã gửi email xác nhận. vui lòng check mail để thanh toán gói sản phẩm!');
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

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\TraCuu;
use App\Models\Checking;

class HomeAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderby("id", "DESC")->where("is_admin", false)->get();
        $admin = User::orderby("id", "DESC")->where("is_admin", true)->get();
        $orders = Order::orderby("id", "DESC")->get();
        $tracuu = TraCuu::orderby("id", "DESC")->get();
        $website = Checking::orderby("id", "DESC")->get();

        return [
            "GroupData_1" => [
                "users" => [
                    "name" => "Thống kê Khách hàng",
                    "count" => "Tổng cộng " . $users->count() . " Khách hàng",
                    "list" => $users->take(10),
                ],
                "orders" => [
                    "name" => "Thống kê đơn hàng",
                    "count" => "Tổng cộng " . $orders->count() . " đơn hàng",
                    "list" => $orders->take(10),
                ],
                "tracuu_free" => [
                    "name" => "Thống kê tra cứu Free",
                    "count" => "Tổng cộng " . $tracuu->where("type", false)->count() . " lượt tra cứu Free",
                    "list" => $tracuu->where("type", false)->take(10),
                ],
                "tracuu_nangcao" => [
                    "name" => "Thống kê tra cứu Nâng cao",
                    "count" => "Tổng cộng " . $tracuu->where("type", true)->count() . " lượt tra cứu Nâng cao",
                    "list" => $tracuu->where("type", true)->take(10),
                ],
                "view_website" => [
                    "name" => "Thống kê lượt view website",
                    "count" => "Tổng cộng " . $website->count() . " lượt view website",
                    "list" => $website->take(10),
                ],
            ],

            "GroupData_2" => [
                "top_sale" => [
                    "name" => "Top nhân viên Sale",
                    "list" => $admin->filter(function($model) {
                        return $model->Attribute->type == "sale";
                    })
                ],
                "top_mkt" => [
                    "name" => "Top nhân viên Marketting",
                    "list" => $admin->filter(function($model) {
                        return $model->Attribute->type == "marketting";
                    })
                ],
            ]
        ];
    }
}

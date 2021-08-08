<!DOCTYPE html>
<html lang="en">

@php
$giatien = 0;
$phivanchuyen = 0;
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello Word</title>

    <style>
        body {
            font-size: 62.5%;
            line-height: 1;
            padding: 22px 10px;
            padding-bottom: 55px;
        }
        .headear {
            font-weight: bold;
            font-size: 3em;
            margin: 0 35px;
        }
        .title {
            font-weight: bold;
            font-size: 1.6em;
            line-height: 1.7em;
            margin-bottom: 10px;
            margin-top: 0px;
            font-family: 'Google Sans';
            color: #0f146d;
        }
        .shop_name {
            text-align: left;
            margin: 0;
        }
        .shop_name b {
            text-transform: capitalize;
        }
        .product_name {
            font-weight: bold;
            margin-top: 0;
        }
        #table {
            display: block;
            width: 725px;
            margin: 5px auto;
            padding: 20px 25px;
            border: 1px solid #0f146d;
        }
        #thongtinmua {
            margin: 0 auto;
            font-size: 1.2em;
            margin-bottom: 15px;
        }
        #thongtinmua thead {
            cursor: pointer;
            background: #c9dff0;
        }
        #thongtinmua thead tr th {
            font-weight: bold;
            padding: 12px 30px;
            padding-left: 42px;
            text-align: left;
            font-family: 'Google Sans';
            color: #0f146d;
        }
        #thongtinmua thead tr th span {
            white-space: nowrap;
            padding-right: 20px;
            background-repeat: no-repeat;
            background-position: 100% 100%;
        }
        #thongtinmua td {
            text-align: left;
        }
        #thongtinmua img {
            margin-right: 15px;
            width: 165px;
        }
        .shop_info {
            display: flex;
            text-align: left;
        }
        .shop_info h4 {
            margin: 0;
            margin-right: 5px;
        }
        .logo {
            text-align: center;
        }
        .logo img {
            width: 150px;
        }
        .camon {
            text-align: center;
            font-size: 27px;
            color: #0f146d;
            font-weight: 500;
        }
        .dichvu {
            margin-top: 15px;
            width: 100%;
        }
        .dichvu a {
            font-size: 18px;
            color: #080c58;
        }
        .chaohoi .p1 {
            font-size: 18px;
            font-family: 'Google Sans';
        }
        .title_address {
            width: 200px;
            color: #080c58;
            font-weight: 500;
        }
        .diachi td {
            font-size: 15px;
        }
        .diachi td a {
            color: #047ebd;
        }
        .diachi .p1 {
            font-size: 18px;
            font-family: 'Google Sans';
        }
        .clear {
            background: #f2f2f2;
            height: 3px;
            margin: 10px 0;
        }
        .title__product {
            font-size: 17px;
            font-weight: 500;
            text-transform: capitalize;
            font-family: 'Google Sans';
        }
        .noidung__sanpham p {
            margin: 5px 0;
        }
        .t__end {
            text-align: end;
        }
        .total {
            color: #c7760c;
            font-weight: 500;
        }
        .tinhtrangdonhang {
            margin-top: 5px;
        }
        .thanhtien {
            width: 100%;
        }
        .thanhtien td {
            font-size: 1.2em;
        }
    </style>
</head>

<body>

    <div id="table">

        <div class="logo">
            <img src="https://stage.thansohocsala.com/img/header/logo.png">
        </div>

        <table class="camon dichvu">
            <tr>
                <td><a href="/">Tư Vấn Thần Số Học</a></td>
                <td><a href="/">Sinh Trắc Vân Tay</a></td>
                <td><a href="/">Khuyến mại lớn</a></td>
                <td><a href="/">Hỗ trợ khách hàng</a></td>
            </tr>
        </table>

        <p class="camon">Cảm ơn bạn đã đặt hàng tại Thần Số Học Sala</p>

        <div class="chaohoi">
            <p class="p1">Xin chào {{ $order['name'] }}</p>
            <p style="margin-top: 0px;">Chúng tôi đã nhận được yêu cầu đặt hàng của bạn và đang tiền hành xử lý. Bạn sẽ
                nhận được thông báo tiếp theo khi đơn hàng đã sẵn sàng được giao.</p>
        </div>

        <div class="diachi">

            <p class="p1">Đơn hàng của bạn được giao đến</p>

            <table width="100%">
                <tr>
                    <td class="title_address">Tên:</td>
                    <td colspan="2">{{ $order['name'] }}</td>
                </tr>
                <tr>
                    <td class="title_address">Địa chỉ nhận hàng:</td>
                    <td colspan="2">{{ $order['address'] }}</td>
                </tr>
                <tr>
                    <td class="title_address">Điện thoại:</td>
                    <td colspan="2">{{ $order['phone'] }}</td>
                </tr>
                <tr>
                    <td class="title_address">Email:</td>
                    <td colspan="2">{{ $order['email'] }}</td>
                </tr>
            </table>

        </div>

        <div class="clear"></div>


        <div id="thongtinmua">

            <p style="text-transform: capitalize;">
                <b>Đơn Hàng #{{ $order['code'] }}</b>
            </p>
            <div>

                <table style="margin: 20px 0;">
                    <tr>
                        <td>
                            <img width="100" src="{{ $order['avatar']}} ">
                        </td>
                        <td style="padding: 0 30px;"></td>
                        <td class="noidung__sanpham">
                            <div>
                                <p class="title__product">{{ $order['name'] }}</p>
                                <p>Gia: {{ $order['price'] }} </p>
                            </div>
                        </td>
                    </tr>
                </table>

            </div>

            <p style="margin-bottom: 0;"><b>Phí vận chuyển:</b> 0.00 VND</p>
            <p style="margin: 0;"><b>Thời gian giao hàng:</b> từ 08/08/2021, đến 10/02/2021</p>
            <p style="margin-top: 0;"><b>Ghi chú: </b> {{ $order['note'] }}</p>

            <div class="clear"></div>

        </div>


        <table class="thanhtien">
            <tr>
                <td>Thành tiền:</td>
                <td class="t__end">{{ $order['price'] }}</td>
                <td class="t__end">VND</td>
            </tr>
            <tr>
                <td>Phí vận chuyển:</td>
                <td class="t__end">0.00</td>
                <td class="t__end">VND</td>
            </tr>
            <tr>
                <td>Giảm giá:</td>
                <td class="t__end">0</td>
                <td class="t__end">VND</td>
            </tr>
            <tr class="total">
                <td>Tổng cộng:</td>
                <td class="t__end">{{ $order['price'] }}</td>
                <td class="t__end">VND</td>
            </tr>
        </table>

        <div class="clear"></div>

        <div class="tinhtrangdonhang">
            <div>Kiểm tra tình trạng đơn hàng <a href="/" target="_blank">Link</a></div>
        </div>

        <div class="luyy">
            <p>*Lưu ý nhỏ cho bạn: Bạn chỉ nên nhận hàng khi trạng thái đơn hàng là “Đang giao hàng” và nhớ kiểm tra Mã
                đơn hàng, Thông tin người gửi và Mã vận đơn để nhận đúng kiện hàng nhé.</p>
        </div>

    </div>

</body>

</html>

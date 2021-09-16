@extends('layouts.app')

@section('content')
    <nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="active">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Đơn đặt hàng</a></li>
            </ol>
        </div>
    </nav>
    <style>
        .eXkgeq .order-info {
            border: 1px solid rgb(221, 221, 221);
            border-radius: 3px;
            box-shadow: none;
            background: rgb(255, 255, 255);
            padding: 10px 15px 0px;
            display: flex;
            flex-shrink: 0;
        }

        img {
            max-width: 100%;
        }

        .eXkgeq .order-info__content {
            padding-left: 0px;
        }

        .eXkgeq .order-info__content .thanks-msg {
            font-size: 16px;
            font-weight: 400;
            margin-top: 0px;
            color: rgb(183, 0, 23);
        }

        .eXkgeq .order-info__content p {
            font-size: 13px;
        }

        .eXkgeq .order-info__content .order-number {
            background: rgb(88, 183, 18);
            font-size: 19px;
            color: rgb(255, 255, 255);
            border: none;
            text-align: center;
            font-weight: 400;
            position: relative;
            border-radius: 0px;
            width: 200px;
            margin-bottom: 10px;
            padding: 9px;
            box-shadow: rgb(0 0 0 / 5%) 0px 1px 1px inset;
        }

        .eXkgeq .order-info__content a {
            text-decoration: none;
            color: rgb(0, 127, 240);
        }

        .eXkgeq .order-info__content .notice-message {
            color: rgb(253, 130, 8);
            line-height: 18px;
        }

        .eXkgeq .order-info__content .alert {
            background: rgb(247, 247, 247);
            color: rgb(0, 0, 0);
            padding: 10px 15px;
            font-size: 13px;
            margin-bottom: 5px;
            border: 1px solid rgb(235, 235, 235);
            border-radius: 4px;
        }

        .eXkgeq .order-info__content ul {
            list-style: none;
            padding: 0px;
        }

        .eXkgeq .order-info__content ul li a {
            color: rgb(0, 127, 240);
            font-size: 13px;
        }

        .eXkgeq .right {
        }

        .eXkgeq .right .tikinow-banner {
            display: block;
        }

    </style>
    <div class="container">
        <div class="row eXkgeq py-4">
            <div class="col-md-9">
                <div class="order-info py-4 row me-0 me-md-4">
                    <div class="col-md-3">
                        <img src="https://salt.tikicdn.com/ts/upload/63/fc/e8/50c078ea9bf9a4627176d3574db7a446.jpg" height="178" width="195" alt="Image" />
                    </div>
                    <div class="col-md-9">
                        <div class="order-info__content w-100">
                            <h3 class="thanks-msg">Cảm ơn bạn đã mua hàng tại Thansohocsala!</h3>
                            <p>Mã số đơn hàng của bạn:</p>
                            <div class="order-number">#{{ $order["code"] }}</div>
                            <p>Bạn có thể xem lại <a target="_blank" href="/tai-khoan/don-hang">đơn hàng của tôi</a></p>
                            <p class="notice-message">Đơn hàng được vận chuyển đến hoặc qua các khu vực đang bị ảnh hưởng bởi Covid-19 sẽ có thể giao chậm hơn dự kiến. Kính mong quý khách thông cảm.</p>
                            <p><img src="https://salt.tikicdn.com/ts/upload/0e/9f/db/225af8863b34521c0b97e96a769a686d.jpg" height="25" width="30" alt="" /> Giao vào Thứ hai, 11/10.</p>
                            <p>Thông tin chi tiết về đơn hàng đã được gửi đến địa chỉ mail <span>{{ $order["email"] }}</span>. Nếu không tìm thấy vui lòng kiểm tra trong hộp thư <strong>Spam</strong> hoặc liên hệ <strong>0942 384 382</strong>.</p>
                            <div class="alert">
                                <p>Nhằm giúp việc xử lý đơn hàng nhanh hơn nữa, Thansohocsala sẽ không gọi điện cho bạn để xác nhận đơn hàng.</p>
                            </div>
                            <h4 class="question-msg">Các câu hỏi thường gặp</h4>
                            <ul>
                                <li><a target="_blank" href="#">Xác nhận đơn hàng như thế nào?</a></li>
                                <li><a target="_blank" href="#">Thời gian giao hàng</a></li>
                                <li><a target="_blank" href="#">Chính sách đổi trả hàng</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="right ms-0 ms-md-3">
                    <a target="_blank" class="tikinow-banner" href="#"><img src="https://pipe.tikicdn.com/media/upload/2018/10/05/32a68799a8a98cd8529e220db7edbbfa.png" alt="" /></a>
                </div>
            </div>
        </div>
    </div>

@endsection

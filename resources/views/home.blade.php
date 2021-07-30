@extends('layouts.app')

@section('content')

<x-slogan />

<x-slider/>

<x-gioi-thieu />

<div class="gia-tri">
    <div class="text-center">
        <h2 class="text-dark titleheader title-h1">GIÁ TRỊ THẦN SỐ HỌC</h2>
    </div>
    <div id="particles-js"></div>
    <div class="container container-header2 px-4">
        <div class="main-block">
            <div class="content-main">
                <div class="row g-0 align-items-center">
                    <div class="col-lg-3">
                        <div class="main-item">
                            <div class="timeline">
                                <div class="lime-height"></div>
                                <div class="item-timeline">
                                    <div class="counter">01</div>
                                    <div class="title">
                                        <h3>Khám phá bí ẩn bản thân</h3>
                                    </div>
                                    <div class="desc">
                                        <span>Khám phá bí ẩn về bản thân, hiểu rõ điểm mạnh, điểm hạn chế của mình để phát huy năng lực và rèn luyện hạn chế</span>
                                    </div>
                                </div>
                                <div class="item-timeline">
                                    <div class="counter indam">02</div>
                                    <div class="title">
                                        <h3>Mối quan hệ tốt đẹp</h3>
                                    </div>
                                    <div class="desc">
                                        <span>Hiểu mình, hiểu người để có những mối quan hệ tốt đẹp hơn</span>
                                    </div>
                                </div>
                                <div class="item-timeline">
                                    <div class="counter">03</div>
                                    <div class="title">
                                        <h3>Định hướng</h3>
                                    </div>
                                    <div class="desc">
                                        <span>Định hướng nghề nghiệp cho bản thân, con cái</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="main-item text-center truc">
                            <img class="co-dinh z-10 mw-100" src="/img/kh/4.png" alt="Thần số học">
                            <img class="co-dinh quay-trai mw-100" src="/img/kh/2.png" alt="Thần số học">
                            <img class="co-dinh quay-phai mw-100" src="/img/kh/3.png" alt="Thần số học">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="main-item">
                            <div class="timeline">
                                <div class="lime-height"></div>
                                <div class="item-timeline">
                                    <div class="counter">04</div>
                                    <div class="title">
                                        <h3>Yêu thương - Gắn kết</h3>
                                    </div>
                                    <div class="desc">
                                        <span>Hiểu để yêu thương đúng cách, gắn kết các thành viên trong gia đình</span>
                                    </div>
                                </div>
                                <div class="item-timeline">
                                    <div class="counter indam">05</div>
                                    <div class="title">
                                        <h3>Dự đoán con đường phát triển</h3>
                                    </div>
                                    <div class="desc">
                                        <span>Hiểu sâu về các sự kiện trong quá khứ, dự đoán về những sự kiện trong tương lai để có sự chuẩn bị trước</span>
                                    </div>
                                </div>
                                <div class="item-timeline">
                                    <div class="counter">06</div>
                                    <div class="title">
                                        <h3>Năng lượng tích cực</h3>
                                    </div>
                                    <div class="desc">
                                        <span>Chọn ngày thành lập công ty, tổ chức sự kiện, ký kết hợp đồng... mang lại năng lượng tích cực nhất</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center btn-dangky">
                    <a href="/tra-cuu">
                        <button class="text-white">ĐĂNG KÍ</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="group-bg">

    <x-chi-so />

    <x-sanpham />

</div>

<x-chuyengia />

<div class="taisao">
    <div class="container">
        <div class="titleheader text-dark text-center">
            <h2 class="title-h1">Gía trị chỉ có khi làm Thần Số Học tại Thần số học Sala</h2>
        </div>
        <div class="main-tasao mt-4">
            <div class="row g-5 mt-1">
                <div class="col-md-6">
                    <div class="block">
                        <div class="stt">1</div>
                        <div class="title"><h2>CHI PHÍ RẺ NHẤT</h2></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="block">
                        <div class="stt">5</div>
                        <div class="title"><h2>ĐỘI NGŨ CHUYÊN GIA TƯ VẤN CHUYÊN SÂU</h2></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="block">
                        <div class="stt">2</div>
                        <div class="title"><h2>Chất lượng tư vấn tốt nhất</h2></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="block">
                        <div class="stt">6</div>
                        <div class="title"><h2>Bảo mật thông tin khách hàng</h2></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="block">
                        <div class="stt">3</div>
                        <div class="title"><h2>Phân tích chính xác, đầy đủ các thông tin chỉ số</h2></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="block">
                        <div class="stt">7</div>
                        <div class="title"><h2>Giải đáp kịp thời mọi thắc mắc đến từ khách hàng</h2></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="block">
                        <div class="stt">4</div>
                        <div class="title"><h2>Có đội ngũ tư vấn chuyên nghiệp</h2></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="block">
                        <div class="stt">8</div>
                        <div class="title"><h2>Chăm sóc sau tư vấn</h2></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<x-khach-hang-phan-hoi />

<x-form-tra-cuu />

@endsection

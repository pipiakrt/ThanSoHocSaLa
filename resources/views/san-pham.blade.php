@extends('layouts.app')

@section('content')

<x-slogan />

<nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="active">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
        </ol>
    </div>
</nav>

<style>
    .bg-xanh {
        background: #0d6256;
    }
    .s-main {
        background: #0d6256;
        border-bottom-right-radius: 450px;
    }
    .s-height {
        max-height: 725.639px;
        height: 725.639px;
    }
    .btn-a1 {
        background: white;
        color: rgb(13, 98, 86);
        font-size: 20px;
        font-weight: bold;
        width: 208px;
        height: 52px;
        border: none;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .btn-a2 {
        background: no-repeat;
        color: rgb(255, 255, 255);
        font-size: 20px;
        font-weight: bold;
        width: 208px;
        height: 52px;
        border: none;
        border-style: solid;
        border-color: rgb(255, 255, 255);
        border-width: 1px;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .vong-tron {
        top: 18%;
        left: -11%;
        position: absolute;
        width: 332px;
        height: 332px;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.4), rgba(42, 72, 88, 0.6));
        border-radius: 1000px;
    }
    .vong-tron-1 {
        width: 332px;
        height: 332px;
        top: -36%;
        right: 34%;
        position: absolute;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.4), rgba(42, 72, 88, 0.6));
        border-radius: 1000px;
    }
    .vong-tron-2 {
        position: absolute;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1), rgba(13, 99, 87, 0.2));
        border-radius: 1000px;
        top: 30%;
        left: 26%;
        width: 384px;
        height: 384px;
    }
    .p-r {
        position: relative;
    }
    .drop-biasach {
        filter: drop-shadow(rgb(0, 0, 0) 0px 15px 13px);
    }
    .fix-center {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .fs-max-1 {
        font-weight: bold;
        font-size: 53px;
    }
    .ss-2 {
        background-color: rgb(245, 246, 249);
    }
    .text-sar1 {
        font-size: 23px;
        text-align: justify;
        font-weight: 100;
        padding-right: 50px;
        width: 90%;
        margin-left: 20px;
    }
    .btn-b1 {
        background-color: rgb(13, 98, 86);
        color: white;
        font-size: 25px;
        font-weight: bold;
        width: 268px;
        height: 67px;
        border: none;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .ss-3 {
        background-color: rgb(245, 246, 249);
    }
    .text-cs3 {
        margin-top: 18px;
        font-size: 35px;
        color: #0d6256;
        margin-left: 10px;
    }
    .c-ul-ss3 {
        padding: 0;
        margin-left: 22px;
        font-size: 22px;
        font-weight: 100;
        text-align: justify;
        margin-right: 25px;
    }
    .ss-slide {
        background-color: rgb(13, 98, 86);
    }
    .sp-next {
        position: absolute;
        width: 19px;
        top: 42%;
        right: 1%;
    }
    .sp-prev {
        position: absolute;
        width: 19px;
        top: 42%;
        left: 1%;
        transform: scale(-1);
    }
    .ss-slide .owl-nav {
        height: 0px;
    }
</style>

<main>
    <div>
        <div class="row g-0 p-r">
            <div class="vong-tron"></div>
            <div class="vong-tron-1"></div>
            <div class="vong-tron-2"></div>
            <div class="col-md-7 text-white bg-xanh s-height">
                <div class="row g-0 h-100">
                    <div class="col-md-3 d-none d-md-block"></div>
                    <div class="col-md-9 bg-white">
                        <div class="s-main h-100">
                            <div class="py-5">
                            </div>
                            <div class="ms-0 ms-md-5 mt-5 pt-4 p-r">
                                <div>
                                    <h2><b>Cuốn sách cuộc đời</b></h2>
                                    <h2><b>khám phá 19 cái "chạm nhẹ" thần kỳ</b></h2>
                                </div>
                                <div class="mt-3 me-5">
                                    <span class="fw-lighter fs-4 fst-italic">Thật khó tin đúng không? Hãy để chúng tôi chứng minh cho bạn. Nếu “<b>Cuốn sách cuộc đời</b>” của chúng tôi thiết kế riêng cho bạn không giúp bạn cảm thấy tốt lên mỗi ngày, 100% tiền đặt hàng sẽ được hoàn lại ngay.</span>
                                </div>
                                <div class="d-flex mt-5">
                                    <a href="#cacbuocdk">
                                        <div class="btn-a1">
                                            ĐĂNG KÝ NGAY
                                            <svg style="margin-bottom: 5px; margin-left: 5px;" xmlns="http://www.w3.org/2000/svg" width="20.0533px" height="24.7543px" preserveAspectRatio="none" viewBox="0 0 1536 1896.0833" class="" fill="#0d6256">
                                                <path d="M1472 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H117q-52 0-84.5-37.5T0 1024V896q0-53 32.5-90.5T117 768h704L528 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z"></path>
                                            </svg>
                                        </div>
                                    </a>
                                    <a href="#xemvideo">
                                        <div class="btn-a2 ms-3">XEM VIDEO &nbsp; &nbsp;
                                            <svg width="29" height="29" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" preserveAspectRatio="none" viewBox="0 0 24 24" class="" fill="rgba(255, 255, 255, 1)"> <path d="M12,20.14C7.59,20.14 4,16.55 4,12.14C4,7.73 7.59,4.14 12,4.14C16.41,4.14 20,7.73 20,12.14C20,16.55 16.41,20.14 12,20.14M12,2.14A10,10 0 0,0 2,12.14A10,10 0 0,0 12,22.14A10,10 0 0,0 22,12.14C22,6.61 17.5,2.14 12,2.14M10,16.64L16,12.14L10,7.64V16.64Z"></path> </svg>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 s-height">
                <div class="row g-0">
                    <div class="col-md-9">
                        <div class="bg-white p-3 s-height fix-center">
                            <img class="mh-100 mw-100 drop-biasach" src="https://w.ladicdn.com/s750x900/5da96e02ecb4f20339f4c96d/z2716369956721_a17c2c0da89549aabce9938f801a7b26-20210914035702.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-md-3 d-none d-md-block"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="text-center pt-5 pb-4" id="xemvideo">
            <h1>Cuốn sách cuộc đời  - “bức tranh”  toàn diện về cuộc đời của</h1>
            <h1 class="fs-max-1 mb-0 mt-4">CHÍNH BẠN</h1>
            <iframe class="mt-4 youtube-responsive" width="730" height="411" src="https://www.youtube.com/embed/Q3ooMw9WsZA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
    <div class="ss-2 py-5">
        <h1 class="text-center">Bạn có đang Bạn đang gặp khó khăn ?</h1>
        <div class="mt-4">
            <div class="container">
                <div class="row g-0">
                    <div class="col-md-7">
                        <div class="fix-center mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="33" preserveAspectRatio="none" viewBox="0 0 1536 1896.0833" class="" fill="rgba(255, 193, 8, 1.0)"> <path d="M896 1376v-192q0-14-9-23t-23-9H672q-14 0-23 9t-9 23v192q0 14 9 23t23 9h192q14 0 23-9t9-23zm256-672q0-88-55.5-163T958 425t-170-41q-243 0-371 213-15 24 8 42l132 100q7 6 19 6 16 0 25-12 53-68 86-92 34-24 86-24 48 0 85.5 26t37.5 59q0 38-20 61t-68 45q-63 28-115.5 86.5T640 1020v36q0 14 9 23t23 9h192q14 0 23-9t9-23q0-19 21.5-49.5T972 957q32-18 49-28.5t46-35 44.5-48 28-60.5 12.5-81zm384 192q0 209-103 385.5T1153.5 1561 768 1664t-385.5-103T103 1281.5 0 896t103-385.5T382.5 231 768 128t385.5 103T1433 510.5 1536 896z"></path> </svg>
                            <div class="text-sar1">Bạn bị mất an toàn về tài chính; không chủ động được thu nhập, thậm chí không có thu nhập?</div>
                        </div>
                        <div class="fix-center mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="33" preserveAspectRatio="none" viewBox="0 0 1536 1896.0833" class="" fill="rgba(255, 193, 8, 1.0)"> <path d="M896 1376v-192q0-14-9-23t-23-9H672q-14 0-23 9t-9 23v192q0 14 9 23t23 9h192q14 0 23-9t9-23zm256-672q0-88-55.5-163T958 425t-170-41q-243 0-371 213-15 24 8 42l132 100q7 6 19 6 16 0 25-12 53-68 86-92 34-24 86-24 48 0 85.5 26t37.5 59q0 38-20 61t-68 45q-63 28-115.5 86.5T640 1020v36q0 14 9 23t23 9h192q14 0 23-9t9-23q0-19 21.5-49.5T972 957q32-18 49-28.5t46-35 44.5-48 28-60.5 12.5-81zm384 192q0 209-103 385.5T1153.5 1561 768 1664t-385.5-103T103 1281.5 0 896t103-385.5T382.5 231 768 128t385.5 103T1433 510.5 1536 896z"></path> </svg>
                            <div class="text-sar1">Bạn không hài lòng với công việc hiện tại? Bạn nên cố tiếp tục hay thay đổi để theo đuổi đam mê?</div>
                        </div>
                        <div class="fix-center mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="33" preserveAspectRatio="none" viewBox="0 0 1536 1896.0833" class="" fill="rgba(255, 193, 8, 1.0)"> <path d="M896 1376v-192q0-14-9-23t-23-9H672q-14 0-23 9t-9 23v192q0 14 9 23t23 9h192q14 0 23-9t9-23zm256-672q0-88-55.5-163T958 425t-170-41q-243 0-371 213-15 24 8 42l132 100q7 6 19 6 16 0 25-12 53-68 86-92 34-24 86-24 48 0 85.5 26t37.5 59q0 38-20 61t-68 45q-63 28-115.5 86.5T640 1020v36q0 14 9 23t23 9h192q14 0 23-9t9-23q0-19 21.5-49.5T972 957q32-18 49-28.5t46-35 44.5-48 28-60.5 12.5-81zm384 192q0 209-103 385.5T1153.5 1561 768 1664t-385.5-103T103 1281.5 0 896t103-385.5T382.5 231 768 128t385.5 103T1433 510.5 1536 896z"></path> </svg>
                            <div class="text-sar1">Bạn cảm thấy tự ti về bản thân, cảm thấy không được tôn trọng thậm chí đôi lúc cảm thấy mình vô dụng?</div>
                        </div>
                        <div class="fix-center mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="33" preserveAspectRatio="none" viewBox="0 0 1536 1896.0833" class="" fill="rgba(255, 193, 8, 1.0)"> <path d="M896 1376v-192q0-14-9-23t-23-9H672q-14 0-23 9t-9 23v192q0 14 9 23t23 9h192q14 0 23-9t9-23zm256-672q0-88-55.5-163T958 425t-170-41q-243 0-371 213-15 24 8 42l132 100q7 6 19 6 16 0 25-12 53-68 86-92 34-24 86-24 48 0 85.5 26t37.5 59q0 38-20 61t-68 45q-63 28-115.5 86.5T640 1020v36q0 14 9 23t23 9h192q14 0 23-9t9-23q0-19 21.5-49.5T972 957q32-18 49-28.5t46-35 44.5-48 28-60.5 12.5-81zm384 192q0 209-103 385.5T1153.5 1561 768 1664t-385.5-103T103 1281.5 0 896t103-385.5T382.5 231 768 128t385.5 103T1433 510.5 1536 896z"></path> </svg>
                            <div class="text-sar1">Chưa có định hướng và chiến lược kinh doanh phù hợp vì không hiểu được quy luật vận hành của doanh nghiệp</div>
                        </div>
                        <div class="fix-center mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="33" preserveAspectRatio="none" viewBox="0 0 1536 1896.0833" class="" fill="rgba(255, 193, 8, 1.0)"> <path d="M896 1376v-192q0-14-9-23t-23-9H672q-14 0-23 9t-9 23v192q0 14 9 23t23 9h192q14 0 23-9t9-23zm256-672q0-88-55.5-163T958 425t-170-41q-243 0-371 213-15 24 8 42l132 100q7 6 19 6 16 0 25-12 53-68 86-92 34-24 86-24 48 0 85.5 26t37.5 59q0 38-20 61t-68 45q-63 28-115.5 86.5T640 1020v36q0 14 9 23t23 9h192q14 0 23-9t9-23q0-19 21.5-49.5T972 957q32-18 49-28.5t46-35 44.5-48 28-60.5 12.5-81zm384 192q0 209-103 385.5T1153.5 1561 768 1664t-385.5-103T103 1281.5 0 896t103-385.5T382.5 231 768 128t385.5 103T1433 510.5 1536 896z"></path> </svg>
                            <div class="text-sar1">Thiếu hiểu biết về quản lý khiến vận hành lộn xộn, không có quy trình bài bản, chưa biết cách lựa chọn và sử dụng nhân sự phù hợp, không thu hút được nhân tài.</div>
                        </div>
                        <div class="fix-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="33" preserveAspectRatio="none" viewBox="0 0 1536 1896.0833" class="" fill="rgba(255, 193, 8, 1.0)"> <path d="M896 1376v-192q0-14-9-23t-23-9H672q-14 0-23 9t-9 23v192q0 14 9 23t23 9h192q14 0 23-9t9-23zm256-672q0-88-55.5-163T958 425t-170-41q-243 0-371 213-15 24 8 42l132 100q7 6 19 6 16 0 25-12 53-68 86-92 34-24 86-24 48 0 85.5 26t37.5 59q0 38-20 61t-68 45q-63 28-115.5 86.5T640 1020v36q0 14 9 23t23 9h192q14 0 23-9t9-23q0-19 21.5-49.5T972 957q32-18 49-28.5t46-35 44.5-48 28-60.5 12.5-81zm384 192q0 209-103 385.5T1153.5 1561 768 1664t-385.5-103T103 1281.5 0 896t103-385.5T382.5 231 768 128t385.5 103T1433 510.5 1536 896z"></path> </svg>
                            <div class="text-sar1">Chưa tìm được ngày thành lập công ty, tổ chức sự kiện, ký kết hợp đồng... mang lại năng lượng tích cực nhất</div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img class="mw-100 mh-100" src="https://w.ladicdn.com/s900x900/5da96e02ecb4f20339f4c96d/banner-problem-20210910104414.jpg" alt="">
                    </div>
                </div>
                <div class="btn-b1 mx-auto mt-5">ĐĂNG KÝ NGAY&nbsp;
                    <svg style="margin-bottom: 5px; margin-left: 5px;" xmlns="http://www.w3.org/2000/svg" width="20.0533px" height="24.7543px" preserveAspectRatio="none" viewBox="0 0 1536 1896.0833" class="" fill="rgb(255, 255, 255)">
                        <path d="M1472 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H117q-52 0-84.5-37.5T0 1024V896q0-53 32.5-90.5T117 768h704L528 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="ss-slide py-4">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-md-9">
                    <div id="spchung" class="owl-carousel owl-theme">
                        <div class="item">
                            <img class="w-100" src="https://w.ladicdn.com/s1300x650/5da96e02ecb4f20339f4c96d/2-20210914031711.png" alt="">
                        </div>
                        <div class="item">
                            <img class="w-100" src="https://w.ladicdn.com/s1300x650/5da96e02ecb4f20339f4c96d/2-20210915031605.png" alt="">
                        </div>
                        <div class="item">
                            <img class="w-100" src="https://w.ladicdn.com/s1300x650/5da96e02ecb4f20339f4c96d/3-20210914031711.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-a1 mx-auto">
            ĐĂNG KÝ NGAY
            <svg style="margin-bottom: 5px; margin-left: 5px;" xmlns="http://www.w3.org/2000/svg" width="20.0533px" height="24.7543px" preserveAspectRatio="none" viewBox="0 0 1536 1896.0833" class="" fill="#0d6256">
                <path d="M1472 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H117q-52 0-84.5-37.5T0 1024V896q0-53 32.5-90.5T117 768h704L528 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z"></path>
            </svg>
        </div>
    </div>
    <div class="ss-3">
        <div class="container">
            <h1 class="text-center mb-5 pt-4">“Cuốn sách cuộc đời” dành cho ai?</h1>
            <div class="row g-0">
                <div class="col-md-4">
                    <div class="d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve" preserveAspectRatio="none" width="49" height="49" class="" fill="rgba(13, 98, 86, 1)"><path d="M45.8,39.6V50H4.2V39.6c0-2.7,1-5.3,3.1-7.4s4.7-3.1,7.4-3.1h20.8c2.7,0,5.3,1,7.4,3.1C44.8,34.3,45.8,36.9,45.8,39.6z   M25,25c6.9,0,12.5-5.6,12.5-12.5S31.9,0,25,0S12.5,5.6,12.5,12.5S18.1,25,25,25z"></path></svg>
                        <h1 class="text-cs3">Cá nhân</h1>
                    </div>
                    <ul class="c-ul-ss3">
                        <li>Tự mình mở cách cửa trí tuệ bên trong và biết cách phát triển bản thân</li>
                        <li>Tạo sự kết nối với nguồn năng lượng về sự thịnh vượng để có sự giàu có bền vững</li>
                        <li>Tạo niềm tin và cài đặt sâu niềm tin, gieo hạt giống thịnh vượng</li>
                        <li>Sống một cuộc đời trọn vẹn và đầy ý nghĩa</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="d-flex">
                        <svg width="58" height="58" xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 184.000000 183.000000" preserveAspectRatio="none" x="0px" y="0px" width="100%" height="100%" class="" fill="rgba(13, 98, 86, 1)"><metadata>
                            Created by potrace 1.11, written by Peter Selinger 2001-2013
                            </metadata><g transform="translate(0.000000,183.000000) scale(0.100000,-0.100000)" stroke="none"><path d="M587 1725 c-122 -45 -207 -166 -207 -292 0 -183 185 -463 305 -463 97 0 234 176 286 367 26 92 21 153 -16 229 -66 134 -235 207 -368 159z"></path><path d="M1185 1257 c-40 -18 -90 -76 -105 -122 -16 -48 -6 -107 30 -183 54 -115 117 -172 173 -158 72 18 170 183 170 286 0 67 -20 108 -76 153 -31 26 -48 32 -100 34 -38 2 -74 -2 -92 -10z"></path><path d="M404 1012 c-161 -117 -243 -335 -187 -498 24 -70 109 -154 188 -183 169 -64 393 -65 559 -1 l30 11 -36 29 c-131 108 -92 368 73 487 l49 35 -37 42 c-36 40 -113 106 -123 106 -3 0 -14 -15 -24 -32 -63 -110 -151 -188 -211 -188 -19 0 -51 13 -80 32 -46 31 -127 128 -140 168 -8 26 -15 25 -61 -8z"></path><path d="M1085 778 c-46 -39 -84 -115 -92 -178 -16 -135 103 -224 286 -216 129 5 201 41 240 119 19 39 22 56 17 100 -8 65 -53 146 -102 183 -35 27 -36 27 -47 8 -23 -42 -94 -104 -120 -104 -30 0 -88 47 -114 91 -10 16 -21 29 -25 29 -4 0 -23 -14 -43 -32z"></path></g></svg>
                        <h1 class="text-cs3">Gia đình</h1>
                    </div>
                    <ul class="c-ul-ss3">
                        <li>Vợ/ chồng muốn hiểu nhau để biết cảm thông và chia sẻ cùng nhau</li>
                        <li>Cha mẹ muốn hiểu con cái để giáo dục và đồng hành cùng con</li>
                        <li>Tìm được định hướng đúng đắn cho con cái</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="d-flex">
                        <svg xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" version="1.1" x="0px" y="0px" viewBox="0 0 100 100" preserveAspectRatio="none" width="63" height="63" class="" fill="rgba(13, 98, 86, 1)"><g transform="translate(0,-952.36218)"><path style="baseline-shift:baseline;block-progression:tb;color:#000000;direction:ltr;text-indent:0;enable-background:accumulate;text-transform:none;" d="m50,966.16c-10.256,0-18.531,8.3046-18.531,18.562,0,7.1578,3.1964,12.793,9.0312,15.906h0.0312c0.054,0.029,0.10185,0.065,0.15625,0.094h0.0312l6.4062,3.5313c0.5109-0.6174,1.2713-1.0313,2.125-1.0313h1.5312c0.84509,0,1.6142,0.3932,2.125,1l6.25-3.4062,0.15625-0.094c5.9535-3.0922,9.25-8.7662,9.25-16,0-10.258-8.3063-18.562-18.562-18.562zm-9.75,36.25c-19.239,6.8625-26.091,23.467-26.375,36.156h27.531l7.625-28.156c-1.4293-0.1159-2.5625-1.355-2.5625-2.8125v-1.5625c0-0.075,0.0253-0.1454,0.0312-0.2188l-6.25-3.4062zm19.531,0-6.25,3.375c0.007,0.084,0.0312,0.1648,0.0312,0.25v1.5625c0,1.4681-1.1497,2.7122-2.5938,2.8125l7.6562,28.156h27.5c-0.28384-12.689-7.1057-29.294-26.344-36.156zm-10.531,2.5312c-0.61933,0-1.0938,0.4744-1.0938,1.0938v1.5625c0,0.6193,0.47442,1.0937,1.0938,1.0937h1.5312c0.61933,0,1.0938-0.4744,1.0938-1.0937v-1.5625c0-0.6194-0.47442-1.0938-1.0938-1.0938h-1.5312z"></path></g></svg>
                        <h1 class="text-cs3">Doanh nghiệp</h1>
                    </div>
                    <ul class="c-ul-ss3">
                        <li>Hiểu sâu về những khả năng tiềm ẩn, phát triển bản lĩnh nhà lãnh đạo, đưa doanh nghiệp đi lên</li>
                        <li>Định hình sứ mệnh bản thân và doanh nghiệp của mình. Xây dựng được 1 văn hóa doanh nghiệp bền vững và trường tồn</li>
                        <li>Phát triển tư duy kinh doanh, xây dựng đội nhóm vững mạnh, biết cách lựa chọn và sử dụng nhân sự phù hợp</li>
                    </ul>
                </div>
            </div>
            <div class="btn-b1 mx-auto">ĐĂNG KÝ NGAY&nbsp;
                <svg style="margin-bottom: 5px; margin-left: 5px;" xmlns="http://www.w3.org/2000/svg" width="20.0533px" height="24.7543px" preserveAspectRatio="none" viewBox="0 0 1536 1896.0833" class="" fill="rgb(255, 255, 255)">
                    <path d="M1472 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H117q-52 0-84.5-37.5T0 1024V896q0-53 32.5-90.5T117 768h704L528 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z"></path>
                </svg>
            </div>
            <div class="p-4"></div>
        </div>
    </div>
    <style>
        .dangkytth .form-input {
            margin-top: 20px;
        }

        .dangkytth .form-input label {
            font-weight: 200;
            margin-bottom: 7px;
        }

        .dangkytth .form-input input {
            height: 50px;
            padding: 0 15px;
            width: 100%;
            outline: none;
            color: #333333;
        }

        .dangkytth .form-input input::placeholder {
            font-weight: 200;
            color: #333333;
        }

        .dangkytth h1 {
            font-weight: bold;
            font-size: 50px;
            letter-spacing: 2px;
            font-family: 'iCiel DIN Pro Condensed';
            color: rgb(13, 99, 87);
        }

        .dangkytth .title-2 {
            font-family: 'iCiel DIN Pro Condensed';
            font-size: 30px;
            line-height: 1.5;
            color: black;
        }

        .fsadfsd {
            background: #0d6357;
            padding-bottom: 13px;
            border-radius: 15px;
        }

        .dangkytth .dangkyngay {
            padding: 8px 40px;
            padding-bottom: 2px;
            color: white;
            border: none;
            border-radius: 5px;
            min-width: 280px;
            font-family: 'iCiel DIN Pro Condensed';
            letter-spacing: 1px;
            font-size: 24px;
            background-color: rgb(232 58 48);
            font-weight: bold;
            margin-top: 20px;
        }

        .dangkytth ul {
            list-style: none;
            padding: 0;
        }
        .thongtingoisp .group-text-2 {
            background-color: #097364;
        }
        .thongtingoisp .group-text {
            background-color: rgb(228, 190, 137);
        }
        .thongtingoisp .btn-trcu {
            padding: 8px 40px;
            padding-bottom: 2px;
            color: white;
            border: none;
            border-radius: 5px;
            min-width: 280px;
            font-family: 'iCiel DIN Pro Condensed';
            letter-spacing: 1px;
            font-size: 24px;
            background-color: rgb(232 58 48);
            font-weight: bold;
            margin-top: 20px;
        }
        .group-item-ssx {
            background-color: rgb(255, 255, 255);
            border-style: solid;
            border-color: rgb(13, 98, 86);
            border-width: 1px;
            border-radius: 30px;
            max-width: 368px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 15px;
            flex-wrap: wrap;
            margin: auto;
        }
        .group-item-ssx h3 {
            color: rgb(0, 0, 0);
            font-size: 32px;
            font-weight: bold;
            margin: 0;
        }
        .group-item-ssx h2 {
            color: rgb(232, 58, 48);
            font-size: 46px;
            font-weight: bold;
            text-align: center;
            line-height: 1.6;
            margin: 0;
        }
        .cs-gia-tri .service2 {
            margin-top: 0;
            padding-bottom: 0;
            position: relative;
        }
        .cs-gia-tri .service2 .bg-sv2 {
            position: absolute;
            background-image: url('https://i.ytimg.com/vi/R9mXtzn8meE/maxresdefault.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            z-index: -1;
            opacity: 0.2;
        }
        .cs-gia-tri .gia-tri-cot-loi .block {
            margin-top: 50px;
            margin-bottom: 40px;
        }
        .cs-gia-tri .gia-tri-cot-loi {
            margin-top: 0;
            padding-bottom: 0;
            min-height: unset;
            border-radius: 55px 0px;
            background-color: unset;
            padding: 0;
        }
        .cs-gia-tri .row.g-0.px-0.px-lg-5 {
            background: white;
            border-radius: 55px;
            margin-top: 50px;
        }
    </style>
    <div class="cs-gia-tri">
        <div class="service2 ketqua-service" id="san-pham">
            <div class="bg-sv2"></div>
            <div class="container">
                <div class="gia-tri-cot-loi bds-lg-initial">
                    <div class="titlecotloi text-dark text-center">
                        <h2 class="title-h1"><span class="h1">10</span> GIÁ TRỊ CHỈ CÓ TẠI</h2>
                        <h2 class="title-h1">BẢN ĐỒ CUỘC ĐỜI THẦN SỐ HỌC SALA</h2>
                    </div>
                    <div class="row g-0 px-0 px-lg-5">
                        <div class="col-lg-6">
                            <div class="block">
                                <div class="d-flex">
                                    <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                    <div class="w-75"><span class="DGESGH2_1">Cung cấp đầy đủ 19 chỉ số quan trọng toàn diện nhất dành cho bạn.</span></div>
                                </div>
                                <div class="d-flex">
                                    <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                    <div class="w-75"><span class="DGESGH2_1">Góc nhìn tích cực, xác định bản chất, tư vấn theo quan điểm xây dựng và phát triển bản thân.</span></div>
                                </div>
                                <div class="d-flex">
                                    <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                    <div class="w-75"><span class="DGESGH2_1">Cho bạn lời khuyên 3 năm sắp tới để đạt được đỉnh thành công.</span></div>
                                </div>
                                <div class="d-flex">
                                    <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                    <div class="w-75"><span class="DGESGH2_1">Hiểu sâu sắc bản thân, nhận biết điểm mạnh, điểm yếu để phát triển sức mạnh, năng lực nội tại bên trong bản thân bạn.</span></div>
                                </div>
                                <div class="d-flex">
                                    <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                    <div class="w-75"><span class="DGESGH2_1">Nhận thức năng lực thiên bẩm của bản thân làm chỗ dựa cho đam mê để lựa chọn công việc phù hợp với bạn.</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="block">
                                <div class="d-flex justify-content-lg-center">
                                    <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                    <div class="w-75"><span class="DGESGH2_1">Thấu hiểu con cái, vợ chồng của mình để đạt được hạnh phúc gia đình.</span></div>
                                </div>
                                <div class="d-flex justify-content-lg-center">
                                    <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                    <div class="w-75"><span class="DGESGH2_1">Được chuyên gia hỗ trợ luận giải và định hướng giải pháp, phát triển đột phá. </span></div>
                                </div>
                                <div class="d-flex justify-content-lg-center">
                                    <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                    <div class="w-75"><span class="DGESGH2_1">Hiểu rõ và điều phối nhân sự một cách hiệu quả nhất.</span></div>
                                </div>
                                <div class="d-flex justify-content-lg-center">
                                    <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                    <div class="w-75"><span class="DGESGH2_1">Phát triển tối đa năng lực cá nhân, tạo ra giá trị lớn cho bản thân và xã hội.</span></div>
                                </div>
                                <div class="d-flex justify-content-lg-center">
                                    <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                    <div class="w-75"><span class="DGESGH2_1">Có được điểm tựa để đi đúng định hướng bạn thân.</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-3"></div>
        </div>
    </div>
    <div class="dangkytth text-white py-5 mb-3 pb-3" id="cacbuocdk">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 text-center">
                    <h1 class="text-dark">CÁC BƯỚC ĐĂNG KÝ</h1>
                </div>
                <div class="col-md-9">
                    <div class="container">
                        <div class="row text-center justify-content-center mb-4">
                            <div class="col-md-6">
                                <div class="group-item-ssx">
                                    <h3 class="text-dark">GÓI CÁ NHÂN</h3>
                                    <h2>950.000 VNĐ</h2>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="group-item-ssx">
                                    <h3 class="text-dark">GÓI DOANH NGHIỆP</h3>
                                    <h2>1.300.000 VNĐ</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <ul>
                        <li>
                            <h4 class="title-2">Bước 1: Đăng ký thông tin theo form</h4>
                        </li>
                        <li>
                            <h4 class="title-2">Bước 2: Đặt lịch với nhân viên tư vấn</h4>
                        </li>
                        <li>
                            <h4 class="title-2">Bước 3: Nhận "Cuốn sách cuộc đời" của riêng bạn</h4>
                        </li>
                        <li>
                            <h4 class="title-2">Bước 4: Tham vấn cùng chuyên gia</h4>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 fsadfsd">
                    <form method="post" action="/tu-van">
                        @csrf
                        <div class="form-input">
                            <input name="name" type="text" placeholder="Họ và tên" required>
                        </div>

                        <div class="form-input">
                            <input id="email" name="email" type="email" placeholder="Email" required>
                        </div>

                        <div class="form-input">
                            <input id="birthday" name="birthdate" type="text" placeholder="Ngày tháng năm sinh" required>
                        </div>

                        <div class="form-input">
                            <input name="phone" type="number" placeholder="Số điện thoại" required>
                        </div>
                        <div>
                            <button type="submit" class="dangkyngay w-100">ĐĂNG KÝ NGAY !</button>
                        </div>
                    </form>
                </div>
                <div class="col-12">
                    <h3 class="text-dark mt-5 text-center">Chúng tôi CAM KẾT khi bạn có trong tay "CUỐN SÁCH CUỘC ĐỜI" và đi theo đúng lộ trình mà HỌC VIỆN CỔ HỌC chia sẻ Cuộc đời bạn sẽ thay đổi tích cực</h3>
                </div>
            </div>
        </div>
    </div>
    <x-khach-hang-phan-hoi />
</main>

@endsection

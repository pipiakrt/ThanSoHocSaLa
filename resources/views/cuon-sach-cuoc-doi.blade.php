@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="/css/post2.css">
@endpush

@section('content')

    <x-slogan />

    <nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <div class="container container-header2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="active">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Giới thiệu cuốn sách cuộc đời</a></li>
            </ol>
        </div>
    </nav>

    <style>
        .biasach {
            filter: drop-shadow(rgb(132, 132, 132) 0px 15px 15px);
        }
        .biasach2 {
            filter: drop-shadow(rgb(132, 132, 132) 0px 15px 15px);
            width: 337px;
        }
        .content p {
            font-size: 23px;
            text-align: justify;
            line-height: 1.6;
            font-weight: 200;
        }
        .title-sck1 h2 {
            color: rgb(30, 47, 91);
            font-size: 42px;
            font-family: "iCiel DIN Pro Condensed";
        }
        .title-sck1 h1 {
            color: rgb(215, 34, 41);
            font-size: 50px;
            font-family: "iCiel DIN Pro Condensed";
        }
        .group-mst1 {
            border-style: solid;
            border-color: rgb(30, 47, 91);
            border-width: 2px;
            border-radius: 20px;
            padding: 20px 15px;
        }
        .group-mst1 .text {
            text-align: justify;
            font-size: 24px;
            font-weight: 200;
            letter-spacing: 0.5px;
        }
        .noi-dung {
            background-color: rgb(13, 98, 86);
        }
        .cst-mts1 {
            font-family: "iCiel DIN Pro Condensed";
            font-size: 55px;
        }
        .group-mstc-1 {
            border-style: solid;
            border-color: rgb(255, 255, 255);
            border-width: 2px;
            border-radius: 20px;
            padding: 12px;
            padding-bottom: 7px;
            margin: 25px 0;
            margin-left: 10px;
            border-left: none;
            border-bottom-left-radius: unset;
            border-top-left-radius: unset;
            position: relative;
        }
        .group-mstc-1.ct {
            border-radius: unset;
            margin: 10px 0;
            border-width: 1px;
            border-left: 1px solid;
            border-color: rgb(255, 255, 255);
            position: unset;
            padding: 10px;
            display: flex;
            align-items: center;
        }
        .group-mstc-1.ct img {
            width: 64px;
            margin-right: 10px;
        }
        .group-mstc-1 .text {
            color: rgb(255, 255, 255);
            font-size: 35px;
            text-transform: uppercase;
            text-align: justify;
            line-height: 1.6;
            font-family: "iCiel DIN Pro Condensed";
        }
        .chamchon {
            position: absolute;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: white;
            top: -7px;
            left: 0;
        }
        .chamchon.bt {
            top: unset;
            bottom: -7px;
        }
        @media (max-width: 768px) {
            .reverse-md {
                flex-direction: column-reverse;
            }
            .group-mst1 .text {
                font-size: 18px;
            }
            .group-mst1 {
                padding: 15px;
            }
            .cst-mts1 {
                font-size: 45px;
            }
            .group-mstc-1 .text {
                font-size: 24px;
            }
        }
    </style>

    <div class="container">
        <div class="py-4 pb-0 pb-lg-4">
            <div class="row gx-0 gx-lg-5 justify-content-center reverse-md">
                <div class="col-lg-7">
                    <div class="content mt-4 mt-lg-0">
                        <p><b><em>Bạn Thân Mến!</em></b></p>
                        <p>Đây là “Cuốn Sách Cuộc Đời” được thiết kế cho riêng bạn.</p>
                        <p>Cuốn sách này được chia làm 3 phần với 19 chỉ số đại diện cho: Tính cách, Năng lực cùng những Ưu điểm và Hạn chế bên trong con người bạn. Từ đó, bạn có thể hình dung được “bức tranh” cuộc đời mình một cách toàn diện, để định hướng và phát huy năng lực vượt trội của chính bản thân mình.</p>
                        <p>Cuốn sách này sẽ chỉ cho bạn thấy tiềm năng có trong con người bạn để phát huy. Tuy nhiên, việc có phát huy được nó hay không phụ thuộcvào nhiều yếu tố: ý chí, sự lựa chọn hay các yếu tố môi trường nằm ngoài tầm kiểm soát của bạn</p>
                        <p>Xin hãy nhớ rằng Sức mạnh và Tiềm năng của bạn tuyệt vời hơn bạn nghĩ rất nhiều. Hành trình khám phá và phát triển bản thân chính là đích đến và lẽ sống của mỗi người.</p>
                        <p><em>Thân ái!</em></p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <img class="biasach w-100" src="https://w.ladicdn.com/s750x900/5da96e02ecb4f20339f4c96d/z2716369956721_a17c2c0da89549aabce9938f801a7b26-20210914035702.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="py-4 pt-0 pt-lg-4">
            <div class="row gx-0 gx-lg-5 justify-content-center">
                <div class="col-lg-11">
                    <img class="mw-100" src="/img/gioithieu/1.jpg" alt="">
                </div>
                <div class="col-lg-11 mt-3">
                    <div class="row g-4">
                        <div class="col-lg-4">
                            <div class="group-mst1">
                                <div class="text">
                                    <span>Giúp bạn hình dung được <b>“BỨC TRANH”</b> cuộc đời mình một cách toàn diện</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="group-mst1">
                                <div class="text">
                                    <span>Giúp bạn <b>ĐỊNH HƯỚNG</b> và <b>PHÁT HUY</b> năng lực vượt trội của chính bản thân mình</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="group-mst1">
                                <div class="text">
                                    <span>Giúp bạn tìm ra con đường <b>NGẮN NHẤT</b> để đi đến <b>ĐỈNH CAO</b> của sự nghiệp và cuộc sống</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="group-mst1">
                                <div class="text">
                                    <span>Giúp bạn trả lời câu hỏi: "Tôi là ai? Sứ mệnh của tôi trong cuộc đời này là gì?"</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="group-mst1">
                                <div class="text">
                                    <span>Giúp bạn <b>PHÁT TRIỂN</b> và <b>BỨT PHÁ</b> bản thân lên một tầm cao mới.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="group-mst1">
                                <div class="text">
                                    <span>Giúp bạn <b>DUY TRÌ</b> năng lượng <b>TÍCH CỰC</b> và <b>BÌNH AN</b> trong cuộc sống</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="noi-dung">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 py-4 py-lg-5">
                    <div class="text-center text-white">
                        <h1><b class="cst-mts1">NỘI DUNG "CUỐN SÁCH CUỘC ĐỜI"</b></h1>
                    </div>
                    <div class="row align-items-center mt-3 mt-lg-5">
                        <div class="col-lg-4 text-center">
                            <img class="biasach2" src="https://w.ladicdn.com/s750x900/5da96e02ecb4f20339f4c96d/z2716369956721_a17c2c0da89549aabce9938f801a7b26-20210914035702.jpg" alt="">
                        </div>
                        <div class="col-lg-8">
                            <div class="d-none d-lg-block">
                                <div class="row text-white">
                                    <div class="col-lg-12">
                                        <div class="group-mstc-1 ms-0 ms-lg-5">
                                            <div class="chamchon"></div>
                                            <div class="chamchon bt"></div>
                                            <div class="text">CHƯƠNG 1: KHÁM PHÁ VÀ RÈN LUYỆN BẢN THÂN</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="group-mstc-1 ms-0 ms-lg-5">
                                            <div class="chamchon"></div>
                                            <div class="chamchon bt"></div>
                                            <div class="text">CHƯƠNG 2: SỨ MỆNH CUỘC ĐỜI & CON ĐƯỜNG PHÁT TRIỂN</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="group-mstc-1 ms-0 ms-lg-5">
                                            <div class="chamchon"></div>
                                            <div class="chamchon bt"></div>
                                            <div class="text">CHƯƠNG 3: LỜI KHUYÊN CHO BẠN</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-block d-lg-none">
                                <div class="row text-white mt-4">
                                    <div class="col-lg-12">
                                        <div class="group-mstc-1 ct ms-0 ms-lg-5">
                                            <img src="https://w.ladicdn.com/s400x400/5da96e02ecb4f20339f4c96d/icon-2-20210921033450.png" alt="">
                                            <div class="text">CHƯƠNG 1: KHÁM PHÁ VÀ RÈN LUYỆN BẢN THÂN</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="group-mstc-1 ct ms-0 ms-lg-5">
                                            <img src="https://w.ladicdn.com/s400x400/5da96e02ecb4f20339f4c96d/icon-2-20210921033450.png" alt="">
                                            <div class="text">CHƯƠNG 2: SỨ MỆNH CUỘC ĐỜI & CON ĐƯỜNG PHÁT TRIỂN</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="group-mstc-1 ct ms-0 ms-lg-5">
                                            <img src="https://w.ladicdn.com/s400x400/5da96e02ecb4f20339f4c96d/icon-2-20210921033450.png" alt="">
                                            <div class="text">CHƯƠNG 3: LỜI KHUYÊN CHO BẠN</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <em><h1 class="text-white mt-3 mt-lg-5 fw-lighter text-center">Nếu bạn chinh phục được chính mình, bạn có thể chinh phục được cả thế giới</h1></em>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

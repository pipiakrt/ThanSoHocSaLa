@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="/css/ket-qua-tra-cuu.css">
    <link rel="stylesheet" href="/css/san-pham.css">
    <link rel="stylesheet" href="/plugins/dtsel-master/dtsel.css">
@endpush

@push('scripts')
    <script src="/plugins/dtsel-master/dtsel.js"></script>
    <script>
        $('#birthday').datepicker({
            format: 'dd-mm-yyyy'
        });
    </script>
@endpush

@section('content')

    <x-slogan />

    <nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="active">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="/san-pham" class="active">Sản phẩm</a></li>
                <li class="breadcrumb-item"><a href="#">{{ $product->name }}</a></li>
            </ol>
        </div>
    </nav>

    <style>
        .thongtingoi.ct .box-item {
            background-color: #ededed;
            padding: 25px 0;
            padding-top: 100px;
            border-radius: 15px;
            height: 100%;
        }

        .thongtingoi.ct .item .image {
            border: 1px solid #03402f;
    height: fit-content !important;
            width: fit-content;
            margin: auto;
            border-radius: 50%;
            text-align: center;
            position: absolute;
            top: -100px;
            right: 0;
            left: 0;
            padding: 8px;
            background-color: white;
        }

        .thongtingoi.ct .title-ct {
            margin-bottom: 100px;
        }

        .thongtingoi.ct .item .hd1 {
            font-size: 40px;
            font-family: 'iCiel DIN Pro Condensed';
        }

        .thongtingoi.ct .item .hd1:last-child {
            font-size: 30px;
        }

        .thongtingoi.ct .dot-item {
            width: 15px;
            height: 15px;
            background-color: #097364;
            border-radius: 50%;
            position: absolute;
            bottom: -7px;
            right: 0;
            left: 0;
            margin: auto;
        }

        .thongtingoi.ct .item .title h4 {
            font-family: unset;
            color: rgb(19 19 19 / 88%);
            font-size: 16px;
        }

        .thongtingoi.ct .item .desc span {
            font-family: unset;
        }

        .thongtingoi.ct .btn-ketqua button {
            font-family: 'iCiel DIN Pro Condensed';
            letter-spacing: unset;
            font-size: 30px;
            background-color: #dab066;
            font-weight: bold;
        }

        .thongtingoi.ct .item .desc {
            padding: 0 45px;
        }

        .thongtingoi.ct ul li::before {
            width: 25px;
            margin-left: -25px;
        }

    </style>

    <style>
        .hd-ct {
            min-height: 660px;
            position: relative;
        }

        .hd-ct .bn-ct {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background-size: cover;
            opacity: 0.29;
            background-image: url("https://media.alobacsi.com/Images/Uploaded/Share/2018/10/04/0adThu-tinh-trong-ong-nghiem-mien-phi-trong-chuong-trinh-Uom-mam-hanh-phuc-2018.jpg");
        }

        .hd-ct .main-ct h1 {
            font-size: 70px;
            color: rgb(13, 98, 86);
            letter-spacing: 5px;
            font-weight: bold;
        }

        .hd-ct .main-ct {
            position: absolute;
            left: 0;
            right: 0;
        }

        .hd-ct .main-ct .desc1 {
            color: #dab066;
            font-size: 50px;
            font-weight: 500;
            letter-spacing: 0;
            margin-left: 100px;
        }

        .hd-ct .main-ct .btn-trcu {
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

    </style>

    <main>
        <div class="hd-ct">
            <div class="bn-ct"></div>
            <div class="container">
                <div class="main-ct py-3 py-md-5 mt-0 mt-md-5">
                    <div class="row justify-content-center">
                        <div class="col-12 col-xl-7 text-center text-xl-start">
                            <h1>HÀNH TRÌNH</h1>
                            <h1><span class="desc1">Khai phá</span> BẢN THÂN</h1>
                        </div>
                    </div>
                </div>
                <div class="main-ct py-5 bottom-0">
                    <div class="row justify-content-center">
                        <div class="col-12 col-xl-7">
                            <div class="row">
                                <div class="col-lg-12 col-xl-8 text-center">
                                    <h3 style="color: rgb(13, 98, 86);">THẦN SỐ HỌC PITAGO</h3>
                                    <div><span class="fw-light">LUẬN GIẢI “Đường đời, vận mệnh, sự nghiệp,…” của chính bạn và người thân của bạn.</span></div>
                                    <div><span class="fw-light">(Bí quyết để có được sự GIÀU CÓ, HẠNH PHÚC & BÌNH AN bền vững)</span></div>
                                    <div>
                                        <a href="/tra-cuu">
                                            <button class="btn-trcu">TRA CỨU CÁC CHỈ SỐ CỦA BẠN NGAY
                                                <svg style="margin-bottom: 5px; margin-left: 5px;" xmlns="http://www.w3.org/2000/svg" width="20.0533px" height="24.7543px" preserveAspectRatio="none" viewBox="0 0 1536 1896.0833" class="" fill="rgba(246, 237, 230, 1)">
                                                    <path d="M1472 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H117q-52 0-84.5-37.5T0 1024V896q0-53 32.5-90.5T117 768h704L528 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z"></path>
                                                </svg>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="thongtingoi ct">
            <div class="container px-0 px-lg-4">
                <div class="maingoi px-0 px-lg-5">
                    <div class="item px-0 px-md-4 pt-0 pt-md-4 py-4">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="title title-ct text-center py-4">
                                    @foreach ($product['options']['title'] as $val)
                                        <h5 class="hd1">{{ $val['name'] }}</h5>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-12 position-relative">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-lg-11">
                                        <div class="row g-0 justify-content-center">
                                            @foreach ($product['options']['desc'] as $desc)
                                                <div class="col-sm-12 col-md-6 col-xl-4 px-4 position-relative bg-ctm">
                                                    <div class="box-item">
                                                        <div class="image">
                                                            <div class="dot-item"></div>
                                                            <div class="fake-image111" style="background-image: url('https://stage.thansohocsala.com/{{ $desc["avatar"] }}')"></div>
                                                        </div>
                                                        <div class="title position-relative">
                                                            @foreach ($desc['name'] as $name)
                                                                <h4>{{ $name['name'] }}</h4>
                                                            @endforeach
                                                        </div>
                                                        <div class="desc">
                                                            <ul class="list-group">
                                                                @foreach ($desc['desc'] as $desc)
                                                                    <li><span>{{ $desc['name'] }}</span></li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-11 px-0 mt-5">
                                <div class="titlea text-center">
                                    <div>
                                        @foreach ($product['options']['title2'] as $val)
                                            <div class="gr-tl"><span>{{ $val['name'] }}</span></div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="title text-center py-0 py-md-5 mb-3 mb-md-0 mt-4">
                                    <h3>{{ $product['options']['desc2']['name'] }}</h3>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="w-100">
                                    <div class="row g-0 justify-content-center g-lg-4">
                                        @foreach ($product['options']['desc2']['items'] as $items)
                                            <div class="col-md-6 col-lg-3">
                                                <div class="row g-0 text-white">
                                                    <div class="col-12">
                                                        <img class="w-100" src="{{ $items['avatar'] }}" alt="">
                                                    </div>
                                                    <div class="col-12 itembg">
                                                        <div class="row justify-content-center g-0">
                                                            <div class="col-10">
                                                                <div class="fw-lighter desc1"><span>{{ $items['name'] }}</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 text-center mb-4">
                                <div class="btn-ketqua text-center mr-0">
                                    <a href="/gio-hang/{{ $product->slug }}">
                                        <button>ĐĂNG KÝ GÓI CƠ BẢN</button>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 text-center mb-4">
                                <div class="btn-ketqua text-center mr-0">
                                    <a href="/gio-hang/{{ $product->slug }}">
                                        <button>ĐĂNG KÝ GÓI NÂNG CAO</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .dangkytth {
                background-color: #097364;
            }

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
                font-size: 40px;
                letter-spacing: 2px;
                font-family: 'iCiel DIN Pro Condensed';
            }

            .dangkytth .title-2 {
                font-family: 'iCiel DIN Pro Condensed';
                font-size: 30px;
                line-height: 1.5;
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
        </style>
        <div class="thongtingoisp">
            <div class="container px-4">
                <div class="row g-0">
                    <div class="col-md-9">
                        <div class="group-text px-4 py-5">
                            <h5 class="text-center">BẮT ĐẦU HÀNH TRÌNH KHÁM PHÁ CÁC CHỈ SỐ CỦA BẠN</h5>
                            <div>
                                <span>Mục tiêu số 1 của Thần Số Học SALA là giúp bạn <b>THẤU HIỂU</b> được cốt lõi của bản thân, <b>KHÁM PHÁ</b> ra những khả năng còn đang tiềm ẩn trong bạn mà có thể bấy lâu bạn chưa biết để <b>KIẾN TẠO</b> nên <b>GIÁ TRỊ</b> của bạn. Trên con đường phát triển giá trị bản thân, dù bạn có tạo nên những thành quả nhỏ nhất đó cũng là điều đáng trân trọng. </span>
                            </div>
                            <div>
                                <span>Chúng tôi sẽ giúp bạn thoát ra khỏi vùng an toàn của bạn và tìm ra con đường <b>NGẮN NHẤT</b> để đi đến <b>ĐỈNH CAO</b> của sự nghiệp và cuộc sống. Bởi chúng tôi biết sức mạnh và tiềm năng của bạn tuyệt vời hơn bạn nghĩ rất nhiều.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="px-4 py-5 text-center">
                            <h1 class="fw-bold text-danger">10.000.000+</h1>
                            <div class="mt-4">
                                <span>NGƯỜI ĐÃ TÌM RA CON ĐƯỜNG DẪN TỚI THÀNH CÔNG, GIÀU CÓ & BÌNH AN THÔNG QUA THẦN SỐ HỌC PITAGO</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="px-4 py-5 group-text-2 text-white">
                            <div class="row g-0 justify-content-center">
                                <div class="col-md-9">
                                    <h3 class="text-center">THẦN SỐ HỌC CHO MỘT NGƯỜI LÀ GÌ</h3>
                                    <div class="mt-4">
                                        <span>Thần số học cho một người là một TẬP SỐ, gồm các chỉ số khác nhau, không chỉ có chỉ số đường đời, hay sứ mệnh mà còn rất nhiều các chỉ số khác nữa. Những chỉ số khi tập hợp với nhau sẽ phản ánh tính cách, suy nghĩ, nội tâm, những sự kiện, sự việc sẽ xảy đến trong cuộc đời của mỗi người.</span>
                                    </div>
                                    <div class="mt-4">
                                        <span>Một bản Thần Số Học hoàn chỉnh bao gồm các con số từ 1 đến 9 và mỗi con số ở mỗi vị trí khác nhau phản ánh một vai trò nhất định. Trong đó đường đời hay sứ mệnh chỉ là một vị trí mà thôi. Sẽ rất phiến diện nếu nói bản thân mình là số này hay số kia. Do vậy, nếu mọi người muốn tìm hiểu về thần số học hãy tìm hiểu một cách CỤ THỂ và CHÍNH XÁC.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="text-center mb-3">
                            <a href="/tra-cuu">
                                <button class="btn-trcu">TRA CỨU CÁC CHỈ SỐ CỦA BẠN NGAY
                                    <svg style="margin-bottom: 5px; margin-left: 5px;" xmlns="http://www.w3.org/2000/svg" width="20.0533px" height="24.7543px" preserveAspectRatio="none" viewBox="0 0 1536 1896.0833" class="" fill="rgba(246, 237, 230, 1)">
                                        <path d="M1472 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H117q-52 0-84.5-37.5T0 1024V896q0-53 32.5-90.5T117 768h704L528 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z"></path>
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dangkytth text-white py-5 mb-3 mb-md-5">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-12 text-center">
                        <h1>CÁC BƯỚC ĐĂNG KÝ TƯ VẤN THẦN SỐ HỌC SALA</h1>
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
                    <div class="col-md-4">
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
                </div>
            </div>
        </div>
        <x-khach-hang-phan-hoi />
    </main>

@endsection

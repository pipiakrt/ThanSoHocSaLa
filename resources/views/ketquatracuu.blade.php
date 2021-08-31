@extends('layouts.app')

@push('head')
    <title>Kết Quản Tra Cứu - Thần Số Học Sala</title>
@endpush

@push('styles')
    <link rel="stylesheet" href="/css/ket-qua-tra-cuu.css">
    <style>
        .ketqua .conso .nb.db {
            left: 25%;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $('#laylink').click(() => {
            var tempInput = document.createElement("input");
            tempInput.value = "{{ $params['link'] }}"
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);
            $('.toast').toast('show')
        })
        $('.custom-next-right').click(() => {
            location.href = "#carouselExampleCaptions";
        })
        $('#sendmail').click(() => {
            $('#box-email').show();
        })

        $('#carouselExampleCaptions').on('slid.bs.carousel', function (e) {
            var ele = $('#carouselExampleCaptions .carousel-item.active');
            $('.eventItem3').removeClass("active")[ele.data('number')];
            $('#carousel-item-' + ele.data('number')).addClass('active');
        })

    </script>
@endpush

@section('content')

<x-slogan />

<nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <div class="container container-header2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="active">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="/tra-cuu/">Tra cứu</a></li>
            <li class="breadcrumb-item"><a href="#">{{ $params['name'] }}</a></li>
        </ol>
    </div>
</nav>

<div class="ketqua">
    <div class="container container-header2 mb-5 pb-1">
        <div class="main-ketqua">
            <div class="row g-0">
                <div class="col-xl-6">
                    <div class="conso">
                        <span class="nb {{ $data['soDuongDoi'] > 10 ? "db" : "" }}">{{ $data['soDuongDoi'] }}</span>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="table-kq">
                        <div class="title text-white">
                            <h5 class="fw-normal">THÔNG TIN CÁ NHÂN</h5>
                        </div>
                        <table class="table fw-light">
                            <tbody class="text-white">
                                <tr>
                                    <td class="header"><span>HỌ VÀ TÊN</span></td>
                                    <td class="text-center text-uppercase"><span>{{ $params['name'] }}</span></td>
                                </tr>
                                <tr>
                                    <td class="header"><span>NGÀY SINH</span></td>
                                    <td class="text-center text-uppercase"><span>{{ $params['birthday'] }}</span></td>
                                </tr>
                                <tr>
                                    <td class="header"><span>ĐỊA CHỈ</span></td>
                                    <td class="text-center"><span style="text-transform: uppercase;">{{ $params['address'] }}</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="conso-qk text-white">
                        <div class="number number-11"><?= $data['DINH_CAO'][0][1]; ?></div>
                        <div class="number number-10"><?= $data['DINH_CAO'][0][2]; ?></div>
                        <div class="number number-9"><?= $data['DINH_CAO'][0][0]; ?></div>
                        <div class="number number-8"><?= $data['DINH_CAO'][0][4]; ?></div>
                        <div class="number number-7"><?= $data['DINH_CAO'][0][3]; ?></div>

                        <div class="number number-6"><?= $data['DINH_CAO'][1][1]; ?></div>
                        <div class="number number-5"><?= $data['DINH_CAO'][1][0]; ?></div>
                        <div class="number number-4 text-center"><?= $data['DINH_CAO'][1][2]; ?></div>

                        <div class="number number-3 text-center"><?= $data['DINH_CAO'][2][0]; ?></div>
                        <div class="number number-2 text-center"><?= $data['DINH_CAO'][2][1]; ?></div>

                        <div class="number number-1 text-center"><?= $data['DINH_CAO'][3][0]; ?></div>
                    </div>
                    <div class="btn-tt">
                        <a href="/tra-cuu">
                            <button>NHẬP LẠI THÔNG TIN</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-ketqua mt-5 pt-5">
        <div class="container container-ketqua">
            <div class="row g-0">
                <div class="col-xl-2"></div>
                <div class="col-xl-10">
                    <div class="desc title text-white"><h3>KHÁM PHÁ CÁC CHỈ SỐ CỦA BẠN</h3></div>
                </div>
                <div class="cus col-12 col-xl-2 d-none d-lg-block">
                    <div class="row g-0 text-white">
                        <div class="col-12">
                            <div id="carousel-item-0" class="eventItem3 item active" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0">
                                <div class="fake-line"></div>
                                <div class="fake-icon">
                                    <div class="icon"></div>
                                </div>
                                <div class="title-item">
                                    <h3>CHỈ SỐ ĐƯỜNG ĐỜI</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div id="carousel-item-1" class="eventItem3 item" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1">
                                <div class="fake-line"></div>
                                <div class="fake-icon">
                                    <div class="icon"></div>
                                </div>
                                <div class="title-item">
                                    <h3>CHỈ SỐ SỨ MỆNH</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div id="carousel-item-2" class="eventItem3 item" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2">
                                <div class="fake-line"></div>
                                <div class="fake-icon">
                                    <div class="icon"></div>
                                </div>
                                <div class="title-item">
                                    <h3>CHỈ SỐ KHUYẾT THIẾU</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div id="carousel-item-3" class="eventItem3 item" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3">
                                <div class="fake-line"></div>
                                <div class="fake-icon">
                                    <div class="icon"></div>
                                </div>
                                <div class="title-item">
                                    <h3>BIỂU ĐỒ NĂNG LỰC</h3>
                                    <h3>VÀ BIỂU ĐỒ BIRTH CHART</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div id="carousel-item-4" class="eventItem3 item" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4">
                                <div class="fake-line"></div>
                                <div class="fake-icon">
                                    <div class="icon"></div>
                                </div>
                                <div class="title-item">
                                    <h3>THÁP ĐỈNH CAO</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cus col-12 col-xl-10 d-none d-lg-block">
                    <div id="carouselExampleCaptions" class="carousel slide text-dark h-100" data-bs-interval="false" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active h-100" data-number="0">
                                <div class="slide-ketqua bg text-white fw-lighter">
                                    <div class="desc">
                                        {!! $data['DUONG_DOI'] !!}
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item h-100" data-number="1">
                                <div class="slide-ketqua bg text-white fw-lighter">
                                    <div class="desc">
                                        {!! $data['SU_MENH'] !!}
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item h-100" data-number="2">
                                <div class="slide-ketqua bg text-white fw-lighter">
                                    @isset($data['KHUYET_THIEU'])
                                        @foreach ($data['KHUYET_THIEU'] as $line)
                                            <div class="desc">
                                                {!! $line !!}
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="desc">
                                            {!! DB::table('contents')->where('page_code', 'MP-KT-0')->first()->page_content !!}
                                        </div>
                                    @endisset
                                </div>
                            </div>
                            <div class="carousel-item h-100" data-number="3">
                                <div class="desc">
                                    <?php
                                        $aryTong = [];
                                        foreach ($data['BIEU_DO_NANG_LUC'][0] AS $item1) {
                                            $aryNL_1[$item1][] = '<span class="chi-so-name">'.$item1.'</span>';
                                            $aryTong[$item1][] = '<span class="chi-so-name">'.$item1.'</span>';
                                        }
                                    ?>
                                </div>
                                <div class="desc" data-number="4">
                                    <?php
                                        foreach ($data['BIEU_DO_NANG_LUC'][1] AS $item1) {
                                            if ($item1 != 0) {
                                                $aryNL_2[$item1][] = '<span class="chi-so-bd">'.$item1.'</span>';
                                                $aryTong[$item1][] = '<span class="chi-so-bd">'.$item1.'</span>';
                                            }
                                        }
                                    ?>
                                </div>
                                <div class="slide-ketqua bg text-white fw-lighter">
                                    <div class="conso2">
                                        <div class="row g-0 justify-content-center">
                                            <div class="col-md-6">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-12 col-lg-6 d-flex justify-content-center">
                                                        <div class="main-chart">
                                                            <div>
                                                                <div class="g-0">
                                                                    <?php foreach ($aryNL_1 AS $item1 => $aryValue) {?>
                                                                        <div class="cs1 nang-luc nang-luc-<?= $item1; ?> ng-star-inserted"><?= implode(' ', $aryValue); ?></div>
                                                                    <?php } ?>
                                                                </div>
                                                                <img src="/img/ket-qua-tra-cuu/luoi.png" alt="">
                                                            </div>
                                                            <div class="title2 mt-5"><h4 class="text-center">BIỂU ĐỒ NĂNG LỰC</h4></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-12 col-lg-6 d-flex justify-content-center">
                                                        <div class="main-chart-2">
                                                            <div>
                                                                <div class="g-0">
                                                                    <?php foreach ($aryNL_2 AS $item1 => $aryValue) {?>
                                                                        <div class="cs1 nang-luc nang-luc-<?= $item1; ?> ng-star-inserted"><?= implode(' ', $aryValue); ?></div>
                                                                    <?php } ?>
                                                                </div>
                                                                <img src="/img/ket-qua-tra-cuu/luoi.png" alt="">
                                                            </div>
                                                            <div class="title2 mt-5"><h4 class="text-center">BIỂU ĐỒ BIRTH CHART</h4></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-12 col-lg-6 d-flex justify-content-center">
                                                        <div class="main-chart-3">
                                                            <div>
                                                                <div class="g-0">
                                                                    <?php foreach ($aryTong AS $item1 => $aryValue) {?>
                                                                        <div class="cs1 nang-luc nang-luc-<?= $item1; ?> ng-star-inserted"><?= implode(' ', $aryValue); ?></div>
                                                                    <?php } ?>
                                                                </div>
                                                                <img src="/img/ket-qua-tra-cuu/luoi.png" alt="">
                                                            </div>
                                                            <div class="title2 mt-5"><h4 class="text-center">BIỂU ĐỒ TỔNG HỢP</h4></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item h-100" data-number="4">
                                <div class="position-relative" style="min-height: 900px; background-color: #097364; padding-top: 50px;">
                                    <div class="conso-qk text-white">
                                        <div class="number number-11"><?= $data['DINH_CAO'][0][1]; ?></div>
                                        <div class="number number-10"><?= $data['DINH_CAO'][0][2]; ?></div>
                                        <div class="number number-9"><?= $data['DINH_CAO'][0][0]; ?></div>
                                        <div class="number number-8"><?= $data['DINH_CAO'][0][4]; ?></div>
                                        <div class="number number-7"><?= $data['DINH_CAO'][0][3]; ?></div>

                                        <div class="number number-6"><?= $data['DINH_CAO'][1][1]; ?></div>
                                        <div class="number number-5"><?= $data['DINH_CAO'][1][0]; ?></div>
                                        <div class="number number-4 text-center"><?= $data['DINH_CAO'][1][2]; ?></div>

                                        <div class="number number-3 text-center"><?= $data['DINH_CAO'][2][0]; ?></div>
                                        <div class="number number-2 text-center"><?= $data['DINH_CAO'][2][1]; ?></div>

                                        <div class="number number-1 text-center"><?= $data['DINH_CAO'][3][0]; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="custom-next-right start" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <div class="text-nr">Chỉ Số Trước</div>
                        </div>
                        <div class="custom-next-right end" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <div class="text-nr">Chỉ Số Sau</div>
                        </div>
                        <div class="custom-top">
                            <a href="#carouselExampleCaptions">
                                <img src="/img/ket-qua-tra-cuu/top.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2"></div>

                <div class="col-12 d-block d-lg-none">
                    <div>
                        <div class="item active">
                            <div class="fake-line"></div>
                            <div class="fake-icon">
                                <div class="icon"></div>
                            </div>
                            <div class="title-item text-white">
                                <h3>CHỈ SỐ ĐƯỜNG ĐỜI</h3>
                            </div>
                        </div>
                        <div class="slide-ketqua bg text-white fw-lighter py-0 pt-3">
                            <div class="desc">
                                {!! $data['DUONG_DOI'] !!}
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="item active">
                            <div class="fake-line"></div>
                            <div class="fake-icon">
                                <div class="icon"></div>
                            </div>
                            <div class="title-item text-white">
                                <h3>CHỈ SỐ SỨ MỆNH</h3>
                            </div>
                        </div>
                        <div class="slide-ketqua bg text-white fw-lighter py-0 pt-3">
                            <div class="desc">
                                {!! $data['SU_MENH'] !!}
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="item active">
                            <div class="fake-line"></div>
                            <div class="fake-icon">
                                <div class="icon"></div>
                            </div>
                            <div class="title-item text-white">
                                <h3>CHỈ SỐ KHUYẾT THIẾU</h3>
                            </div>
                        </div>
                        <div class="slide-ketqua bg text-white fw-lighter py-0 pt-3">
                            @isset($data['KHUYET_THIEU'])
                                @foreach ($data['KHUYET_THIEU'] as $line)
                                    <div class="desc">
                                        {!! $line !!}
                                    </div>
                                @endforeach
                            @else
                                <div class="desc">
                                    {!! DB::table('contents')->where('page_code', 'MP-KT-0')->first()->page_content !!}
                                </div>
                            @endisset
                        </div>
                    </div>
                    <div>
                        <div class="item active">
                            <div class="fake-line"></div>
                            <div class="fake-icon">
                                <div class="icon"></div>
                            </div>
                            <div class="title-item text-white">
                                <h3>BIỂU ĐỒ NĂNG LỰC</h3>
                                <h3>VÀ BIỂU ĐỒ BIRTH CHART</h3>
                            </div>
                        </div>
                        <div class="slide-ketqua bg text-white fw-lighter py-0 pt-3">
                            <div class="desc">
                                <?php
                                    $aryTong = [];
                                    foreach ($data['BIEU_DO_NANG_LUC'][0] AS $item1) {
                                        $aryNL_1[$item1][] = '<span class="chi-so-name">'.$item1.'</span>';
                                        $aryTong[$item1][] = '<span class="chi-so-name">'.$item1.'</span>';
                                    }
                                ?>
                            </div>
                            <div class="desc" data-number="4">
                                <?php
                                    foreach ($data['BIEU_DO_NANG_LUC'][1] AS $item1) {
                                        if ($item1 != 0) {
                                            $aryNL_2[$item1][] = '<span class="chi-so-bd">'.$item1.'</span>';
                                            $aryTong[$item1][] = '<span class="chi-so-bd">'.$item1.'</span>';
                                        }
                                    }
                                ?>
                            </div>
                            <div class="slide-ketqua bg text-white fw-lighter" style="padding-bottom: 0 !important; padding-top: 0 !important;">
                                <div class="conso2">
                                    <div class="row g-0 justify-content-center">
                                        <div class="col-md-6">
                                            <div class="row justify-content-center">
                                                <div class="col-md-12 col-lg-6 d-flex justify-content-center">
                                                    <div class="main-chart">
                                                        <div>
                                                            <div class="g-0">
                                                                <?php foreach ($aryNL_1 AS $item1 => $aryValue) {?>
                                                                    <div class="cs1 nang-luc nang-luc-<?= $item1; ?> ng-star-inserted"><?= implode(' ', $aryValue); ?></div>
                                                                <?php } ?>
                                                            </div>
                                                            <img src="/img/ket-qua-tra-cuu/luoi.png" alt="">
                                                        </div>
                                                        <div class="title2 mt-5"><h4 class="text-center">BIỂU ĐỒ NĂNG LỰC</h4></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row justify-content-center">
                                                <div class="col-md-12 col-lg-6 d-flex justify-content-center">
                                                    <div class="main-chart-2">
                                                        <div>
                                                            <div class="g-0">
                                                                <?php foreach ($aryNL_2 AS $item1 => $aryValue) {?>
                                                                    <div class="cs1 nang-luc nang-luc-<?= $item1; ?> ng-star-inserted"><?= implode(' ', $aryValue); ?></div>
                                                                <?php } ?>
                                                            </div>
                                                            <img src="/img/ket-qua-tra-cuu/luoi.png" alt="">
                                                        </div>
                                                        <div class="title2 mt-5"><h4 class="text-center">BIỂU ĐỒ BIRTH CHART</h4></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row justify-content-center">
                                                <div class="col-md-12 col-lg-6 d-flex justify-content-center">
                                                    <div class="main-chart-3">
                                                        <div>
                                                            <div class="g-0">
                                                                <?php foreach ($aryTong AS $item1 => $aryValue) {?>
                                                                    <div class="cs1 nang-luc nang-luc-<?= $item1; ?> ng-star-inserted"><?= implode(' ', $aryValue); ?></div>
                                                                <?php } ?>
                                                            </div>
                                                            <img src="/img/ket-qua-tra-cuu/luoi.png" alt="">
                                                        </div>
                                                        <div class="title2 mt-5"><h4 class="text-center">BIỂU ĐỒ TỔNG HỢP</h4></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="desc"></div>
                        </div>
                    </div>
                    <div>
                        <div class="item active">
                            <div class="fake-line"></div>
                            <div class="fake-icon">
                                <div class="icon"></div>
                            </div>
                            <div class="title-item text-white">
                                <h3>THÁP ĐỈNH CAO</h3>
                            </div>
                        </div>
                        <div class="slide-ketqua bg text-white fw-lighter py-0 pt-3">
                            <div class="position-relative" style="min-height: 400px; background-color: #097364;">
                                <div class="conso-qk text-white">
                                    <div class="number number-11"><?= $data['DINH_CAO'][0][1]; ?></div>
                                    <div class="number number-10"><?= $data['DINH_CAO'][0][2]; ?></div>
                                    <div class="number number-9"><?= $data['DINH_CAO'][0][0]; ?></div>
                                    <div class="number number-8"><?= $data['DINH_CAO'][0][4]; ?></div>
                                    <div class="number number-7"><?= $data['DINH_CAO'][0][3]; ?></div>

                                    <div class="number number-6"><?= $data['DINH_CAO'][1][1]; ?></div>
                                    <div class="number number-5"><?= $data['DINH_CAO'][1][0]; ?></div>
                                    <div class="number number-4 text-center"><?= $data['DINH_CAO'][1][2]; ?></div>

                                    <div class="number number-3 text-center"><?= $data['DINH_CAO'][2][0]; ?></div>
                                    <div class="number number-2 text-center"><?= $data['DINH_CAO'][2][1]; ?></div>

                                    <div class="number number-1 text-center"><?= $data['DINH_CAO'][3][0]; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-10">
                    <div class="share-ketqua text-white">
                        <div class="d-flex justify-content-end">
                            <div class="toast fade hide" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header">
                                    <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#007aff"></rect></svg>
                                    <strong class="me-auto">Thông báo</strong>
                                    <small>1 giây trước</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body" style="background-color: white; color: darkblue;">
                                    Coppy Đường Đẫn Thành Công
                                </div>
                            </div>
                        </div>
                        <div class="titlecs text-center fw-light"><h4>CHIA SẺ NGAY</h4></div>
                        <div class="row g-0 justify-content-center mt-5">
                            <div class="col-sm-4 col-md-3 col-xl-2 text-center">
                                <div class="d-flex align-items-center justify-content-center justify-content-md-start ms-2 ms-md-0">
                                    <div>
                                        <img src="/img/ket-qua-tra-cuu/FB.png" alt="">
                                    </div>
                                    <div>
                                        <iframe style="margin-left: 10px; margin-top: 20px" src="https://www.facebook.com/plugins/share_button.php?href={{ $params['link'] }}&layout=button&size=large&appId=293925195838543&width=87&height=28" width="100" height="35" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mt-sm-0 col-sm-4 col-md-3 col-xl-2 text-center">
                                <div class="d-flex align-items-center justify-content-center justify-content-md-start me-4 me-md-0">
                                    <div>
                                        <img src="/img/ket-qua-tra-cuu/mail.png" alt="">
                                    </div>
                                    <div id="sendmail">
                                        <span class="chiasetitle">Gửi mail</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mt-sm-0 col-sm-4 col-md-3 col-xl-2 text-center">
                                <div id="laylink" class="d-flex align-items-center justify-content-center justify-content-md-start me-4 me-md-0">
                                    <div>
                                        <img src="/img/ket-qua-tra-cuu/link.png" alt="">
                                    </div>
                                    <div>
                                        <span class="chiasetitle">Lấy link</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-4" id="box-email" style="display: none">
                                <form method="POST"action="/gui-mail-ket-qua">
                                    @csrf
                                    <div class="row g-0 justify-content-center">
                                        <div class="col-md-3">
                                            <div class="form-input">
                                                <label class="w-100" for="email">Email</label>
                                                <input id="email" name="email" type="email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 text-center">
                                            <button class="mail-sm">Gửi</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="clear-hr"></div>
                        <div class="titlecs text-center"><h4>THẦN SỐ HỌC CHO MỘT NGƯỜI LÀ GÌ</h4></div>
                        <div class="desccs fw-lighter">
                            <div><span>Thần số học cho một người là một TẬP SỐ, gồm các chỉ số khác nhau, không chỉ có chỉ số đường đời, hay sứ mệnh mà còn rất nhiều các chỉ số khác nữa. Những chỉ số khi tập hợp với nhau sẽ phản ánh tính cách, suy nghĩ, nội tâm, những sự kiện, sự việc sẽ xảy đến trong cuộc đời của mỗi người.</span></div>
                            <div class="mt-2"><span>Một bản Thần Số Học hoàn chỉnh bao gồm các con số từ 1 đến 9 và mỗi con số ở mỗi vị trí khác nhau phản ánh một vai trò nhất định. Trong đó đường đời hay sứ mệnh chỉ là một vị trí mà thôi. Sẽ rất phiến diện nếu nói bản thân mình là số này hay số kia. Do vậy, nếu mọi người muốn tìm hiểu về thần số học hãy tìm hiểu một cách CỤ THỂ và CHÍNH XÁC.</span></div>
                        </div>
                        <div class="btn-ketqua text-center">
                            <a href="/tai-khoan/tra-cuu-nang-cao">
                                <button>TRA CỨU CHUYÊN SÂU</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

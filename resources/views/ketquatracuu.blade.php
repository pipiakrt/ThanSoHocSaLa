@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="/css/ket-qua-tra-cuu.css">
<style type="text/css" >
    .slide-ketqua .desc {
        line-height: 35px;
    }
    .content-ketqua .bang-so .cs1 {
        font-size: 16px;
        font-weight: 300;
        min-height: 85px;
        line-height: normal;
    }
    .kimtuthap, .main-chart, .main-chart-2, .main-chart-3 {
        margin-bottom: 55px;
        position: relative;
        float: left;
    }
    .kimtuthap{
        margin-top: 234px;
        width: 100%;
        margin-left: -412px;
    }
    .data-number, .nang-luc {
        position: absolute;
        text-align: center;
        letter-spacing: .583333px;
        font-size: 14px;
        line-height: 18px;
        text-transform: none;
    }
    .chi-so-bd {
        color: #c1bc0e;
    }
    .chi-so-name {
        color: #ea3c07;
    }
    .nang-luc {
        font-size: 16px;
    }

    .nang-luc-1 {
        top: 205px;
        left: 5px;
    }
    .nang-luc-2 {
        top: 120px;
        left: 5px;
    }
    .nang-luc-3 {
        top: 45px;
        left: 5px;
    }
    .nang-luc-4 {
        top: 205px;
        left: 90px;
    }
    .nang-luc-5 {
        top: 120px;
        left: 90px;
    }
    .nang-luc-6 {
        top: 45px;
        left: 90px;
    }
    .nang-luc-7 {
        top: 205px;
        left: 175px;
    }
    .nang-luc-8 {
        top: 120px;
        left: 175px;
    }
    .nang-luc-9 {
        top: 45px;
        left: 175px;
    }
</style>
@endpush

@section('content')

<div class="slogan bg-xanh-nhat text-white text-center">
    <h1>"KIẾN TẠO CUỘC ĐỜI HẠNH PHÚC TỪ NHỮNG CON SỐ"</h1>
</div>

<nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <div class="container container-header2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Tra cứu</a></li>
        </ol>
    </div>
</nav>

<div class="ketqua">
    <div class="container container-header2 mb-5 pb-1">
        <div class="main-ketqua">
            <div class="row g-0">
                <div class="col-xl-6">
                    <div class="conso">
                        <span class="nb">{{ $data['soDuongDoi'] }}</span>
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
                                    <td class="text-center"><span></span></td>
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
                <div class="cus col-12 col-xl-2">
                    <div class="row g-0 text-white">
                        <div class="col-12">
                            <div class="eventItem3 item" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0">
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
                            <div class="eventItem3 item active" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1">
                                <div class="fake-line"></div>
                                <div class="fake-icon">
                                    <div class="icon"></div>
                                </div>
                                <div class="title-item">
                                    <h3>CHỈ SỐ SƯ MỆNH</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="eventItem3 item" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2">
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
                            <div class="eventItem3 item" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3">
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
                    </div>
                </div>
                <div class="cus col-12 col-xl-10">
                    <div id="carouselExampleCaptions" class="carousel slide text-dark h-100" data-bs-interval="false" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item h-100">
                                <div class="slide-ketqua bg text-white fw-lighter">
                                    <div class="desc">
                                        {!! $data['DUONG_DOI'] !!}
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item active h-100">
                                <div class="slide-ketqua bg text-white fw-lighter">
                                    <div class="desc">
                                        {!! $data['SU_MENH'] !!}
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item h-100">
                                <div class="slide-ketqua bg text-white fw-lighter">
                                    @foreach ($data['KHUYET_THIEU'] as $line)
                                        <div class="desc">
                                            {!! $line !!}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item h-100">
                                <div class="desc">
                                    <?php
                                        $aryTong = [];
                                        foreach ($data['BIEU_DO_NANG_LUC'][0] AS $item1) {
                                            $aryNL_1[$item1][] = '<span class="chi-so-name">'.$item1.'</span>';
                                            $aryTong[$item1][] = '<span class="chi-so-name">'.$item1.'</span>';
                                        }
                                    ?>
                                </div>
                                <div class="desc">
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
                                                    <div class="col-md-12 col-lg-6">
                                                        <div class="main-chart">
                                                            <div>
                                                                <div class="g-0">
                                                                    <?php foreach ($aryNL_1 AS $item1 => $aryValue) {?>
                                                                        <div class="cs1 nang-luc nang-luc-<?= $item1; ?> ng-star-inserted"><?= implode(' ', $aryValue); ?></div>
                                                                    <?php } ?>
                                                                </div>
                                                                <img src="/img/ket-qua-tra-cuu/luoi.png" alt="">
                                                            </div>
                                                            <div class="title2 mt-5"><h4 class="text-center text-md-start">BIỂU ĐỒ NĂNG LỰC</h4></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-12 col-lg-6">
                                                        <div class="main-chart-2">
                                                            <div>
                                                                <div class="g-0">
                                                                    <?php foreach ($aryNL_2 AS $item1 => $aryValue) {?>
                                                                        <div class="cs1 nang-luc nang-luc-<?= $item1; ?> ng-star-inserted"><?= implode(' ', $aryValue); ?></div>
                                                                    <?php } ?>
                                                                </div>
                                                                <img src="/img/ket-qua-tra-cuu/luoi.png" alt="">
                                                            </div>
                                                            <div class="title2 mt-5"><h4 class="text-center text-md-start">BIỂU ĐỒ BIRTH CHART</h4></div>
                                                        </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-12 col-lg-6">
                                                        <div class="main-chart-3">
                                                            <div>
                                                                <div class="g-0">
                                                                    <?php foreach ($aryTong AS $item1 => $aryValue) {?>
                                                                        <div class="cs1 nang-luc nang-luc-<?= $item1; ?> ng-star-inserted"><?= implode(' ', $aryValue); ?></div>
                                                                    <?php } ?>
                                                                </div>
                                                                <img src="/img/ket-qua-tra-cuu/luoi.png" alt="">
                                                            </div>
                                                            <div class="title2 mt-5"><h4 class="text-center text-md-start">BIỂU ĐỒ TỔNG HỢP</h4></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2"></div>
                <div class="col-xl-10">
                    <div class="share-ketqua text-white">
                        <div class="titlecs text-center fw-light"><h4>CHIA SẺ NGAY</h4></div>
                        <div class="row g-0 justify-content-center mt-5">
                            <div class="col-sm-4 col-md-3 col-xl-2 text-center">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <img src="/img/ket-qua-tra-cuu/FB.png" alt="">
                                    </div>
                                    <div>
                                        <span class="chiasetitle">Facebook</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mt-sm-0 col-sm-4 col-md-3 col-xl-2 text-center">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <img src="/img/ket-qua-tra-cuu/mail.png" alt="">
                                    </div>
                                    <div>
                                        <span class="chiasetitle">Gửi mail</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mt-sm-0 col-sm-4 col-md-3 col-xl-2 text-center">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <img src="/img/ket-qua-tra-cuu/link.png" alt="">
                                    </div>
                                    <div>
                                        <span class="chiasetitle">Lấy link</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear-hr"></div>
                        <div class="titlecs text-center"><h4>nhận giải mã trực tiếp</h4></div>
                        <div class="desccs fw-lighter">
                            <div><span>Nếu bạn muốn biết chi tiết hơn về những lời khuyên phù hợp nhất, giải mã vận mệnh, thăng </span></div>
                            <div><span>trầm và ý nghĩa từng năm. Khám phá Giải mã chi tiết chuyên sâu ngay.</span></div>
                        </div>
                        <div class="btn-ketqua text-center">
                            <a href="">
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

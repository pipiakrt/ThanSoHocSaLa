@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="/css/post2.css">
    <link rel="stylesheet" href="/css/postDetail2.css">
@endpush

@section('content')


<div class="slogan bg-xanh-nhat text-white text-center">
    <h1>"KIẾN TẠO CUỘC ĐỜI HẠNH PHÚC TỪ NHỮNG CON SỐ"</h1>
</div>

<nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <div class="container container-header2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">{{ $post->type == 'post' ? 'Tin tức' : 'Câu chuyện' }}</a></li>
            <li class="breadcrumb-item"><a href="#">{{ $post->name }}</a></li>
        </ol>
    </div>
</nav>
<main>
    <div class="post-slogan post-sloganDetail">
        <div class="container container-header2">
            <div class="title text-center">
                <h1>{{ $post->author }}</h1>
                <div class="br-cs1"></div>
                <div class="br-cs2"></div>
            </div>
            <div class="post-content pb-0 pt-2">
                <div class="desc-1 text-center">
                    <h3>{{ $post->name }}</h3>
                </div>
                <div class="desc text-center fw-lighter mb-5">
                    <span>{{ $post->description }}</span>
                </div>
            </div>
        </div>
        <hr>
        <div class="container container-header2">
            <div class="post-content">
                {!! $post->content !!}
            </div>
        </div>

        <div class="post-relate">
            <div class="container container-postDetail">
                <div class="relate-title"><h3>CÓ THỂ BẠN MUỐN XEM?</h3></div>
                <div class="row g-0 g-sm-4 mt-4">
                    <div class="col-md-6">
                        <div class="relate-item">
                            <div class="row g-0 g-lg-4">
                                <div class="col-lg-12 col-xl-6">
                                    <div class="post-image" style="background-image: url('/img/post/1.png');"></div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="item-name mt-4 mt-lg-0 ">
                                        <h3>Tuấn Dương 36 tuổi</h3>
                                    </div>
                                    <div class="item-title">
                                        <h5>Thần Số Học đã đến với tôi như chiếc chìa khóa, mở cánh cửa sâu bên trong tâm hồn tôi</h5>
                                    </div>
                                    <div class="item-desc fw-lighter">
                                        <span>Tôi đã từng chênh vênh vì không xác định được hướng đi của mình. Mấy năm nay, tôi thay đổi công việc và chỗ làm liên tục vì không biết..</span>
                                    </div>
                                    <div class="item-btn">
                                        <a href="#">XEM THÊM</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="relate-item mt-4 mt-md-0">
                            <div class="row g-0 g-lg-4">
                                <div class="col-lg-12 col-xl-6">
                                    <div class="post-image" style="background-image: url('/img/post/4.png');"></div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="item-name mt-4 mt-lg-0 ">
                                        <h3>Tuấn Dương 36 tuổi</h3>
                                    </div>
                                    <div class="item-title">
                                        <h5>Thần Số Học đã đến với tôi như chiếc chìa khóa, mở cánh cửa sâu bên trong tâm hồn tôi</h5>
                                    </div>
                                    <div class="item-desc fw-lighter">
                                        <span>Tôi đã từng chênh vênh vì không xác định được hướng đi của mình. Mấy năm nay, tôi thay đổi công việc và chỗ làm liên tục vì không biết..</span>
                                    </div>
                                    <div class="item-btn">
                                        <a href="#">XEM THÊM</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container container-header">
            <div class="footer text-white d-flex align-items-center">
                <div class="w-100">
                    <div class="row g-0">
                        <div class="col-sm-6 col-lg-3">
                            <div class="footer-logo">
                                <img src="/img/footer/logo.png" alt="Thần số học">
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="footer-title"><h2>HỖ TRỢ KHÁCH HÀNG</h2></div>
                            <div class="footer-item">
                                <span>Hotline: 0942 384 382</span>
                            </div>
                            <div class="footer-item">
                                <span>Email: hotro@thansohocsala.com</span>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="footer-title"><h2>VỀ SALA GROUP</h2></div>
                            <div class="footer-item">
                                <span>Giới thiệu SaLa Group</span>
                            </div>
                            <div class="footer-item">
                                <span>Tuyển dụng</span>
                            </div>
                            <div class="footer-item">
                                <span>Chính sách giải quyết khiếu nại</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-title"><h2>CONNECT</h2></div>
                            <div class="footer-item">
                                <span>Follow us for the lastest news, work and behind the scenes at Sala Media Group!</span>
                            </div>
                            <div class="footer-lk">
                                <img src="/img/icon/instagram.png" alt="Than So Hoc Lien Ket">
                                <img src="/img/icon/tchich.png" alt="Than So Hoc Lien Ket">
                                <img src="/img/icon/youtube.png" alt="Than So Hoc Lien Ket">
                                <img src="/img/icon/vecto.png" alt="Than So Hoc Lien Ket">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="coppyright">
            <div class="container container-header">
                <div class="content-c">
                    <span>Copyright @ Sala Media Group 2021. All Rights Reserved.</span>
                </div>
            </div>
        </div>
    </footer>

</main>

@endsection

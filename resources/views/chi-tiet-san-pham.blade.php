@extends('layouts.app')


@push('styles')
    <link rel="stylesheet" href="/css/ket-qua-tra-cuu.css">
    <link rel="stylesheet" href="/css/san-pham.css">
@endpush

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


<main>
    <div class="sliders">
        <div id="sliders" class="owl-carousel owl-theme">
            <div class="item">
                <img class="header-logo" alt="Thần Số Học" src="/img/sliders/2.png">
            </div>
            <div class="item">
                <img class="header-logo" alt="Thần Số Học" src="/img/sliders/2.png">
            </div>
        </div>
    </div>

    <div class="tieudegoi">
        <div class="container px-0 px-lg-4 pt-5">
            <div class="row g-0 h-100">
                <div class="col-md-4">
                    <div class="eventItem2 active item" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="0">
                        <div class="tengoi">
                            <h3>GÓI CÁ NHÂN</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="eventItem2 item" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="1">
                        <div class="tengoi">
                            <h3>GÓI GIA ĐÌNH</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="eventItem2 item" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="2">
                        <div class="tengoi">
                            <h3>GÓI DOANH NGHIỆP</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="thongtingoi">
        <div class="container px-0 px-lg-4">
            <div class="maingoi px-0 px-lg-5">
                <div id="carouselExampleCaptions2" class="carousel slide text-dark h-100" data-bs-interval="false" data-bs-ride="carousel">
                    <div class="carousel-inner h-100">
                        <div class="carousel-item active h-100">
                            <div class="item px-0 px-md-4 py-4">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="title text-center py-4">
                                            <h5 class="hd1">MỘT LẦN MẤT KIỂM SOÁT</h5>
                                            <h5 class="hd1">ĐÁNH MẤT HẠNH PHÚC CẢ CUỘC ĐỜI</h5>
                                            <h5 class="hd1">Nóng giận - Đổ lỗi - Phán xét - Chê bai</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-12 position-relative">
                                        <div class="row g-0 justify-content-center g-lg-4">
                                            <div class="col-sm-12 col-md-6 col-xl-4 px-4 position-relative bg-ctm">
                                                <div class="image">
                                                    <div class="avatar c1"></div>
                                                </div>
                                                <div class="title position-relative">
                                                    <h4>ĐÁNH MẤT YÊU THƯƠNG</h4>
                                                    <h4>TRONG GIA ĐÌNH</h4>
                                                </div>
                                                <div class="desc">
                                                    <ul class="list-group">
                                                        <li><span>Vợ chồng bất đồng, tranh cãi, tức giận nhất thời có thể ly tán cả một cuộc hôn nhân</span></li>
                                                        <li><span>Cha mẹ con cái khó chịu, không cùng chung ý kiến, tức giận nhất thời có thể không bao giờ nhìn mặt nhau</span></li>
                                                        <li><span>Anh chị em đỗ lỗi, chê bai, tức giận nhất thời có thể xung đột mãi mãi</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-xl-4 px-4 position-relative bg-ctm">
                                                <div class="image">
                                                    <div class="avatar c2"></div>
                                                </div>
                                                <div class="title position-relative">
                                                    <h4>ĐÁNH MẤT CƠ HỘI THĂNG TIẾN</h4>
                                                    <h4>THÀNH CÔNG TRONG CÔNG VIỆC</h4>
                                                </div>
                                                <div class="desc">
                                                    <ul class="list-group">
                                                        <li><span>Tranh cãi, chê bai nhau, tức giận nhất thời với đồng nghiệp có thể mất nguồn lực trong công ty</span></li>
                                                        <li><span>Bất đồng , khó chịu, tức giận nhất thời với sếp có thể mất việc và mất niềm tin</span></li>
                                                        <li><span>Phán xét, mâu thuẫn, tức giận nhất thời với đối tác có thể mất hợp đồng, mất doanh thu</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-xl-4 px-4 position-relative bg-ctm">
                                                <div class="image">
                                                    <div class="avatar c3"></div>
                                                </div>
                                                <div class="title position-relative">
                                                    <h4>ĐÁNH MẤT MỐI QUAN HỆ</h4>
                                                    <h4>TRONG XÃ HỘI</h4>
                                                </div>
                                                <div class="desc">
                                                    <ul class="list-group">
                                                        <li><span>Phán xét, bắt bẻ bạn bè, tức giận nhất thời có thể giết chết tình bạn cả 10 năm</span></li>
                                                        <li><span>Bất đồng, tranh cãi, tức giận nhất thời với người yêu có thể chấm dứt một mối quan hệ đang tốt đẹp</span></li>
                                                        <li><span>Khó chịu, đánh giá, tức giận với mọi người có thể khiến mình căng thẳng và bị xa lánh</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-11 px-0 mt-5">
                                        <div class="titlea text-center">
                                            <div>
                                                <div class="gr-tl"><span>NẾU BẠN THƯỜNG XUYÊN NÓNG GIẬN, KHÔNG THỂ KIỂM SOÁT NHỮNG CẢM XÚC TIÊU CỰC CỦA MÌNH. BẠN KHÔNG MUỐN TRẢ GIÁ CHO SỰ NGU DẠI NHẤT THỜI ĐÓ</span></div>
                                                <div class="gr-tl"><span>THÌ ĐÂY CHÍNH LÀ GIẢI PHÁP DÀNH CHO BẠN!</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="title text-center py-5 mt-4">
                                            <h3>GÓI SẢN PHẨM NÀY SẼ GIÚP BẠN:</h3>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="w-100">
                                            <div class="row g-0 justify-content-center g-lg-4">
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/b.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Tự mình mở cách cửa trí tuệ bên trong và biết cách phát triển bản thân</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/c.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Tạo sự kết nối với nguồn năng lượng về sự thịnh vượng để có sự giàu có bền vững</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/d.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Tạo niềm tin và cài đặt sâu niềm tin, gieo hạt giống thịnh vượng</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/e.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Sống một cuộc đời trọn vẹn và đầy ý nghĩa</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mb-4">
                                        <div class="btn-ketqua text-center mr-0">
                                            <a href="/tai-khoan/gio-hang/ca-nhan">
                                                <button>Mua Ngay</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item h-100">
                            <div class="item px-0 px-lg-4 py-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="title text-center py-4">
                                            <h5 class="hd1">MỘT LẦN MẤT KIỂM SOÁT</h5>
                                            <h5 class="hd1">ĐÁNH MẤT SỰ NGHIỆP CẢ CUỘC ĐỜI</h5>
                                            <h5 class="hd1">Bảo thủ - Chỉ trích - Đổ lỗi - Chê bai</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-12 position-relative">
                                        <div class="row g-0 g-lg-4">
                                            <div class="col-md-4 px-4 position-relative">
                                                <div class="image">
                                                    <div class="avatar c1"></div>
                                                </div>
                                                <div class="title position-relative">
                                                    <h4>ĐÁNH MẤT SỰ PHÁT TRIỂN DOANH</h4>
                                                    <h4>NGHIỆP VÌ KHÔNG BIẾT CÁCH</h4>
                                                    <h4>ĐIỀU PHỐI NHÂN SỰ</h4>
                                                </div>
                                                <div class="desc">
                                                    <ul class="list-group">
                                                        <li><span>Bảo thủ, chỉ trích, xu nịnh, sếp nói sao nghe vậy</span></li>
                                                        <li><span>Đánh giá thấp người có năng lực, không thường xuyên trao đổi</span></li>
                                                        <li><span>Đề cao chủ nghĩa cá nhân và lan truyền cảm xúc tiêu cưc</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-4 position-relative">
                                                <div class="image">
                                                    <div class="avatar c2"></div>
                                                </div>
                                                <div class="title position-relative">
                                                    <h4>ĐÁNH MẤT DOANH NGHIỆP</h4>
                                                    <h4>KHÔNG CÓ ĐỊNH HƯỚNG, KẾ HOẠCH</h4>
                                                </div>
                                                <div class="desc">
                                                    <ul class="list-group">
                                                        <li><span>Suy nghĩ ngắn hạn, chỉ tập trung vào lợi nhuận mà không phát triển doanh nghiệp</span></li>
                                                        <li><span>Tư duy trong “tháp” - tức chỉ dựa trên đặc trưng và sự tác động đến một bộ phận sẽ làm hạn chế những ý tưởng và làm suy yếu hoạt động của công ty</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-4 position-relative">
                                                <div class="image">
                                                    <div class="avatar c3"></div>
                                                </div>
                                                <div class="title position-relative">
                                                    <h4>ĐÁNH MẤT MỐI QUAN HỆ</h4>
                                                    <h4>TRONG XÃ HỘI</h4>
                                                </div>
                                                <div class="desc">
                                                    <ul class="list-group">
                                                        <li><span>Đánh giá thấp các mối quan hệ, không tập trung xây dựng các mối quan hệ trong và ngoài công ty</span></li>
                                                        <li><span>Không chú ý đến các nhu cầu mang tính xã hội, bỏ qua nhu cầu phát triển của các thành viên, tạo cho nhân viên cảm giác không muốn đến văn phòng, chỉ làm việc rồi về</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-11 px-0 mt-5">
                                        <div class="titlea text-center">
                                            <div>
                                                <div class="gr-tl"><span>NẾU DOANH NGHIỆP BẠN KHÔNG PHÁT TRIỂN, KHÔNG THỂ KIỂM SOÁT NHỮNG THÔNG TIN XÚC TIÊU CỰC. NẾU BẠN KHÔNG MUỐN ĐÁNH MẤT DOANH NGHIỆP, SỰ NGHIỆP MÀ CẢ ĐỜI GÂY DỰNG</span></div>
                                                <div class="gr-tl"><span>THÌ ĐÂY CHÍNH LÀ GIẢI PHÁP DÀNH CHO BẠN!</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="title text-center py-5 mt-4">
                                            <h3>GÓI SẢN PHẨM NÀY SẼ GIÚP BẠN:</h3>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="w-100">
                                            <div class="row g-0 g-lg-4 mb-5">
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/f.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg c">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Phát triển tư duy kinh doanh, xây dựng đội nhóm vững mạnh, biết cách lựa chọn và sử dụng nhân sự phù hợp</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/g.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg c">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Hiểu sâu về những khả năng tiềm ẩn, phát triển bản lĩnh nhà lãnh đạo, đưa doanh nghiệp đi lên</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/h.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg c">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Định hình sứ mệnh bản thân và doanh nghiệp của mình. Xây dựng được 1 văn hóa doanh nghiệp bền vững và trường tồn</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/i.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg c">
                                                            <div class="row justify-content-center g-0">
                                                                {{-- <div class="col-10">
                                                                    <h3>góc nhìn mới giúp định</h3>
                                                                </div> --}}
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Hiểu được quy luật vận hành của doanh nghiệp để định hướng chiến lược kinh doanh trong năm nay và 3 năm tiếp theo</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mb-4">
                                        <div class="btn-ketqua text-center mr-0">
                                            <a href="tel:0987654321">
                                                <button>LIÊN HỆ 0987654321</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item h-100">
                            <div class="item px-0 px-lg-4 py-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="title text-center py-4">
                                            <h5 class="hd1">MỘT LẦN MẤT KIỂM SOÁT</h5>
                                            <h5 class="hd1">ĐÁNH MẤT SỰ NGHIỆP CẢ CUỘC ĐỜI</h5>
                                            <h5 class="hd1">Bảo thủ - Chỉ trích - Đổ lỗi - Chê bai</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-12 position-relative">
                                        <div class="row g-0 g-lg-4">
                                            <div class="col-md-4 px-4 position-relative">
                                                <div class="image">
                                                    <div class="avatar c1"></div>
                                                </div>
                                                <div class="title position-relative">
                                                    <h4>ĐÁNH MẤT SỰ PHÁT TRIỂN DOANH</h4>
                                                    <h4>NGHIỆP VÌ KHÔNG BIẾT CÁCH</h4>
                                                    <h4>ĐIỀU PHỐI NHÂN SỰ</h4>
                                                </div>
                                                <div class="desc">
                                                    <ul class="list-group">
                                                        <li><span>Bảo thủ, chỉ trích, xu nịnh, sếp nói sao nghe vậy</span></li>
                                                        <li><span>Đánh giá thấp người có năng lực, không thường xuyên trao đổi</span></li>
                                                        <li><span>Đề cao chủ nghĩa cá nhân và lan truyền cảm xúc tiêu cưc</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-4 position-relative">
                                                <div class="image">
                                                    <div class="avatar c2"></div>
                                                </div>
                                                <div class="title position-relative">
                                                    <h4>ĐÁNH MẤT DOANH NGHIỆP</h4>
                                                    <h4>KHÔNG CÓ ĐỊNH HƯỚNG, KẾ HOẠCH</h4>
                                                </div>
                                                <div class="desc">
                                                    <ul class="list-group">
                                                        <li><span>Suy nghĩ ngắn hạn, chỉ tập trung vào lợi nhuận mà không phát triển doanh nghiệp</span></li>
                                                        <li><span>Tư duy trong “tháp” - tức chỉ dựa trên đặc trưng và sự tác động đến một bộ phận sẽ làm hạn chế những ý tưởng và làm suy yếu hoạt động của công ty</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-4 position-relative">
                                                <div class="image">
                                                    <div class="avatar c3"></div>
                                                </div>
                                                <div class="title position-relative">
                                                    <h4>ĐÁNH MẤT MỐI QUAN HỆ</h4>
                                                    <h4>TRONG XÃ HỘI</h4>
                                                </div>
                                                <div class="desc">
                                                    <ul class="list-group">
                                                        <li><span>Đánh giá thấp các mối quan hệ, không tập trung xây dựng các mối quan hệ trong và ngoài công ty</span></li>
                                                        <li><span>Không chú ý đến các nhu cầu mang tính xã hội, bỏ qua nhu cầu phát triển của các thành viên, tạo cho nhân viên cảm giác không muốn đến văn phòng, chỉ làm việc rồi về</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-11 px-0 mt-5">
                                        <div class="titlea text-center">
                                            <div>
                                                <div class="gr-tl"><span>NẾU DOANH NGHIỆP BẠN KHÔNG PHÁT TRIỂN, KHÔNG THỂ KIỂM SOÁT NHỮNG THÔNG TIN XÚC TIÊU CỰC. NẾU BẠN KHÔNG MUỐN ĐÁNH MẤT DOANH NGHIỆP, SỰ NGHIỆP MÀ CẢ ĐỜI GÂY DỰNG</span></div>
                                                <div class="gr-tl"><span>THÌ ĐÂY CHÍNH LÀ GIẢI PHÁP DÀNH CHO BẠN!</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="title text-center py-5 mt-4">
                                            <h3>GÓI SẢN PHẨM NÀY SẼ GIÚP BẠN:</h3>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="w-100">
                                            <div class="row g-0 g-lg-4 mb-5">
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/f.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg c">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Phát triển tư duy kinh doanh, xây dựng đội nhóm vững mạnh, biết cách lựa chọn và sử dụng nhân sự phù hợp</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/g.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg c">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Hiểu sâu về những khả năng tiềm ẩn, phát triển bản lĩnh nhà lãnh đạo, đưa doanh nghiệp đi lên</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/h.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg c">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Định hình sứ mệnh bản thân và doanh nghiệp của mình. Xây dựng được 1 văn hóa doanh nghiệp bền vững và trường tồn</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/i.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg c">
                                                            <div class="row justify-content-center g-0">
                                                                {{-- <div class="col-10">
                                                                    <h3>góc nhìn mới giúp định</h3>
                                                                </div> --}}
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Hiểu được quy luật vận hành của doanh nghiệp để định hướng chiến lược kinh doanh trong năm nay và 3 năm tiếp theo</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mb-4">
                                        <div class="btn-ketqua text-center mr-0">
                                            <a href="/tai-khoan/gio-hang/doanh-nghiep">
                                                <button>Mua Ngay</button>
                                            </a>
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
    <div class="tieudegoi" id="list-p2">
        <div class="container px-0 px-lg-4 pt-5">
            <div class="row g-0 h-100">
                <div class="col-md-4">
                    <div class="eventItem2 active item" data-bs-target="#carouselExampleCaptions3" data-bs-slide-to="0">
                        <div class="tengoi">
                            <h3>GÓI DOANH NGHIỆP</h3>
                            <h3>(10 NHÂN SỰ)</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="eventItem2 item" data-bs-target="#carouselExampleCaptions3" data-bs-slide-to="1">
                        <div class="tengoi">
                            <h3>GÓI DOANH NGHIỆP</h3>
                            <h3>(20 NHÂN SỰ)</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="eventItem2 item" data-bs-target="#carouselExampleCaptions3" data-bs-slide-to="2">
                        <div class="tengoi">
                            <h3>GÓI DOANH NGHIỆP</h3>
                            <h3>(30 NHÂN SỰ)</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="thongtingoi">
        <div class="container px-0 px-lg-4">
            <div class="maingoi px-0 px-lg-5">
                <div id="carouselExampleCaptions3" class="carousel slide text-dark h-100" data-bs-interval="false" data-bs-ride="carousel">
                    <div class="carousel-inner h-100">
                        <div class="carousel-item active h-100">
                            <div class="item px-0 px-md-4 py-4">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="title text-center py-4">
                                            <h5 class="hd1">MỘT LẦN MẤT KIỂM SOÁT</h5>
                                            <h5 class="hd1">ĐÁNH MẤT HẠNH PHÚC CẢ CUỘC ĐỜI</h5>
                                            <h5 class="hd1">Nóng giận - Đổ lỗi - Phán xét - Chê bai</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-12 position-relative">
                                        <div class="row g-0 justify-content-center g-lg-4">
                                            <div class="col-sm-12 col-md-6 col-xl-4 px-4 position-relative bg-ctm">
                                                <div class="image">
                                                    <div class="avatar c1"></div>
                                                </div>
                                                <div class="title position-relative">
                                                    <h4>ĐÁNH MẤT YÊU THƯƠNG</h4>
                                                    <h4>TRONG GIA ĐÌNH</h4>
                                                </div>
                                                <div class="desc">
                                                    <ul class="list-group">
                                                        <li><span>Vợ chồng bất đồng, tranh cãi, tức giận nhất thời có thể ly tán cả một cuộc hôn nhân</span></li>
                                                        <li><span>Cha mẹ con cái khó chịu, không cùng chung ý kiến, tức giận nhất thời có thể không bao giờ nhìn mặt nhau</span></li>
                                                        <li><span>Anh chị em đỗ lỗi, chê bai, tức giận nhất thời có thể xung đột mãi mãi</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-xl-4 px-4 position-relative bg-ctm">
                                                <div class="image">
                                                    <div class="avatar c2"></div>
                                                </div>
                                                <div class="title position-relative">
                                                    <h4>ĐÁNH MẤT CƠ HỘI THĂNG TIẾN</h4>
                                                    <h4>THÀNH CÔNG TRONG CÔNG VIỆC</h4>
                                                </div>
                                                <div class="desc">
                                                    <ul class="list-group">
                                                        <li><span>Tranh cãi, chê bai nhau, tức giận nhất thời với đồng nghiệp có thể mất nguồn lực trong công ty</span></li>
                                                        <li><span>Bất đồng , khó chịu, tức giận nhất thời với sếp có thể mất việc và mất niềm tin</span></li>
                                                        <li><span>Phán xét, mâu thuẫn, tức giận nhất thời với đối tác có thể mất hợp đồng, mất doanh thu</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-xl-4 px-4 position-relative bg-ctm">
                                                <div class="image">
                                                    <div class="avatar c3"></div>
                                                </div>
                                                <div class="title position-relative">
                                                    <h4>ĐÁNH MẤT MỐI QUAN HỆ</h4>
                                                    <h4>TRONG XÃ HỘI</h4>
                                                </div>
                                                <div class="desc">
                                                    <ul class="list-group">
                                                        <li><span>Phán xét, bắt bẻ bạn bè, tức giận nhất thời có thể giết chết tình bạn cả 10 năm</span></li>
                                                        <li><span>Bất đồng, tranh cãi, tức giận nhất thời với người yêu có thể chấm dứt một mối quan hệ đang tốt đẹp</span></li>
                                                        <li><span>Khó chịu, đánh giá, tức giận với mọi người có thể khiến mình căng thẳng và bị xa lánh</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-11 px-0 mt-5">
                                        <div class="titlea text-center">
                                            <div>
                                                <div class="gr-tl"><span>NẾU BẠN THƯỜNG XUYÊN NÓNG GIẬN, KHÔNG THỂ KIỂM SOÁT NHỮNG CẢM XÚC TIÊU CỰC CỦA MÌNH. BẠN KHÔNG MUỐN TRẢ GIÁ CHO SỰ NGU DẠI NHẤT THỜI ĐÓ</span></div>
                                                <div class="gr-tl"><span>THÌ ĐÂY CHÍNH LÀ GIẢI PHÁP DÀNH CHO BẠN!</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="title text-center py-5 mt-4">
                                            <h3>GÓI SẢN PHẨM NÀY SẼ GIÚP BẠN:</h3>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="w-100">
                                            <div class="row g-0 justify-content-center g-lg-4">
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/b.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Tự mình mở cách cửa trí tuệ bên trong và biết cách phát triển bản thân</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/c.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Tạo sự kết nối với nguồn năng lượng về sự thịnh vượng để có sự giàu có bền vững</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/d.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Tạo niềm tin và cài đặt sâu niềm tin, gieo hạt giống thịnh vượng</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/e.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Sống một cuộc đời trọn vẹn và đầy ý nghĩa</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mb-4">
                                        <div class="btn-ketqua text-center mr-0">
                                            <a href="tel:0987654321">
                                                <button>LIÊN HỆ 0987654321</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item h-100">
                            <div class="item px-0 px-lg-4 py-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="title text-center py-4">
                                            <h5 class="hd1">MỘT LẦN MẤT KIỂM SOÁT</h5>
                                            <h5 class="hd1">ĐÁNH MẤT SỰ NGHIỆP CẢ CUỘC ĐỜI</h5>
                                            <h5 class="hd1">Bảo thủ - Chỉ trích - Đổ lỗi - Chê bai</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-12 position-relative">
                                        <div class="row g-0 g-lg-4">
                                            <div class="col-md-4 px-4 position-relative">
                                                <div class="image">
                                                    <div class="avatar c1"></div>
                                                </div>
                                                <div class="title position-relative">
                                                    <h4>ĐÁNH MẤT SỰ PHÁT TRIỂN DOANH</h4>
                                                    <h4>NGHIỆP VÌ KHÔNG BIẾT CÁCH</h4>
                                                    <h4>ĐIỀU PHỐI NHÂN SỰ</h4>
                                                </div>
                                                <div class="desc">
                                                    <ul class="list-group">
                                                        <li><span>Bảo thủ, chỉ trích, xu nịnh, sếp nói sao nghe vậy</span></li>
                                                        <li><span>Đánh giá thấp người có năng lực, không thường xuyên trao đổi</span></li>
                                                        <li><span>Đề cao chủ nghĩa cá nhân và lan truyền cảm xúc tiêu cưc</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-4 position-relative">
                                                <div class="image">
                                                    <div class="avatar c2"></div>
                                                </div>
                                                <div class="title position-relative">
                                                    <h4>ĐÁNH MẤT DOANH NGHIỆP</h4>
                                                    <h4>KHÔNG CÓ ĐỊNH HƯỚNG, KẾ HOẠCH</h4>
                                                </div>
                                                <div class="desc">
                                                    <ul class="list-group">
                                                        <li><span>Suy nghĩ ngắn hạn, chỉ tập trung vào lợi nhuận mà không phát triển doanh nghiệp</span></li>
                                                        <li><span>Tư duy trong “tháp” - tức chỉ dựa trên đặc trưng và sự tác động đến một bộ phận sẽ làm hạn chế những ý tưởng và làm suy yếu hoạt động của công ty</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-4 position-relative">
                                                <div class="image">
                                                    <div class="avatar c3"></div>
                                                </div>
                                                <div class="title position-relative">
                                                    <h4>ĐÁNH MẤT MỐI QUAN HỆ</h4>
                                                    <h4>TRONG XÃ HỘI</h4>
                                                </div>
                                                <div class="desc">
                                                    <ul class="list-group">
                                                        <li><span>Đánh giá thấp các mối quan hệ, không tập trung xây dựng các mối quan hệ trong và ngoài công ty</span></li>
                                                        <li><span>Không chú ý đến các nhu cầu mang tính xã hội, bỏ qua nhu cầu phát triển của các thành viên, tạo cho nhân viên cảm giác không muốn đến văn phòng, chỉ làm việc rồi về</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-11 px-0 mt-5">
                                        <div class="titlea text-center">
                                            <div>
                                                <div class="gr-tl"><span>NẾU DOANH NGHIỆP BẠN KHÔNG PHÁT TRIỂN, KHÔNG THỂ KIỂM SOÁT NHỮNG THÔNG TIN XÚC TIÊU CỰC. NẾU BẠN KHÔNG MUỐN ĐÁNH MẤT DOANH NGHIỆP, SỰ NGHIỆP MÀ CẢ ĐỜI GÂY DỰNG</span></div>
                                                <div class="gr-tl"><span>THÌ ĐÂY CHÍNH LÀ GIẢI PHÁP DÀNH CHO BẠN!</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="title text-center py-5 mt-4">
                                            <h3>GÓI SẢN PHẨM NÀY SẼ GIÚP BẠN:</h3>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="w-100">
                                            <div class="row g-0 g-lg-4 mb-5">
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/f.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg c">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Phát triển tư duy kinh doanh, xây dựng đội nhóm vững mạnh, biết cách lựa chọn và sử dụng nhân sự phù hợp</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/g.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg c">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Hiểu sâu về những khả năng tiềm ẩn, phát triển bản lĩnh nhà lãnh đạo, đưa doanh nghiệp đi lên</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/h.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg c">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Định hình sứ mệnh bản thân và doanh nghiệp của mình. Xây dựng được 1 văn hóa doanh nghiệp bền vững và trường tồn</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/i.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg c">
                                                            <div class="row justify-content-center g-0">
                                                                {{-- <div class="col-10">
                                                                    <h3>góc nhìn mới giúp định</h3>
                                                                </div> --}}
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Hiểu được quy luật vận hành của doanh nghiệp để định hướng chiến lược kinh doanh trong năm nay và 3 năm tiếp theo</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mb-4">
                                        <div class="btn-ketqua text-center mr-0">
                                            <a href="tel:0987654321">
                                                <button>LIÊN HỆ 0987654321</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item h-100">
                            <div class="item px-0 px-lg-4 py-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="title text-center py-4">
                                            <h5 class="hd1">MỘT LẦN MẤT KIỂM SOÁT</h5>
                                            <h5 class="hd1">ĐÁNH MẤT SỰ NGHIỆP CẢ CUỘC ĐỜI</h5>
                                            <h5 class="hd1">Bảo thủ - Chỉ trích - Đổ lỗi - Chê bai</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-12 position-relative">
                                        <div class="row g-0 g-lg-4">
                                            <div class="col-md-4 px-4 position-relative">
                                                <div class="image">
                                                    <div class="avatar c1"></div>
                                                </div>
                                                <div class="title position-relative">
                                                    <h4>ĐÁNH MẤT SỰ PHÁT TRIỂN DOANH</h4>
                                                    <h4>NGHIỆP VÌ KHÔNG BIẾT CÁCH</h4>
                                                    <h4>ĐIỀU PHỐI NHÂN SỰ</h4>
                                                </div>
                                                <div class="desc">
                                                    <ul class="list-group">
                                                        <li><span>Bảo thủ, chỉ trích, xu nịnh, sếp nói sao nghe vậy</span></li>
                                                        <li><span>Đánh giá thấp người có năng lực, không thường xuyên trao đổi</span></li>
                                                        <li><span>Đề cao chủ nghĩa cá nhân và lan truyền cảm xúc tiêu cưc</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-4 position-relative">
                                                <div class="image">
                                                    <div class="avatar c2"></div>
                                                </div>
                                                <div class="title position-relative">
                                                    <h4>ĐÁNH MẤT DOANH NGHIỆP</h4>
                                                    <h4>KHÔNG CÓ ĐỊNH HƯỚNG, KẾ HOẠCH</h4>
                                                </div>
                                                <div class="desc">
                                                    <ul class="list-group">
                                                        <li><span>Suy nghĩ ngắn hạn, chỉ tập trung vào lợi nhuận mà không phát triển doanh nghiệp</span></li>
                                                        <li><span>Tư duy trong “tháp” - tức chỉ dựa trên đặc trưng và sự tác động đến một bộ phận sẽ làm hạn chế những ý tưởng và làm suy yếu hoạt động của công ty</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-4 position-relative">
                                                <div class="image">
                                                    <div class="avatar c3"></div>
                                                </div>
                                                <div class="title position-relative">
                                                    <h4>ĐÁNH MẤT MỐI QUAN HỆ</h4>
                                                    <h4>TRONG XÃ HỘI</h4>
                                                </div>
                                                <div class="desc">
                                                    <ul class="list-group">
                                                        <li><span>Đánh giá thấp các mối quan hệ, không tập trung xây dựng các mối quan hệ trong và ngoài công ty</span></li>
                                                        <li><span>Không chú ý đến các nhu cầu mang tính xã hội, bỏ qua nhu cầu phát triển của các thành viên, tạo cho nhân viên cảm giác không muốn đến văn phòng, chỉ làm việc rồi về</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-11 px-0 mt-5">
                                        <div class="titlea text-center">
                                            <div>
                                                <div class="gr-tl"><span>NẾU DOANH NGHIỆP BẠN KHÔNG PHÁT TRIỂN, KHÔNG THỂ KIỂM SOÁT NHỮNG THÔNG TIN XÚC TIÊU CỰC. NẾU BẠN KHÔNG MUỐN ĐÁNH MẤT DOANH NGHIỆP, SỰ NGHIỆP MÀ CẢ ĐỜI GÂY DỰNG</span></div>
                                                <div class="gr-tl"><span>THÌ ĐÂY CHÍNH LÀ GIẢI PHÁP DÀNH CHO BẠN!</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="title text-center py-5 mt-4">
                                            <h3>GÓI SẢN PHẨM NÀY SẼ GIÚP BẠN:</h3>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="w-100">
                                            <div class="row g-0 g-lg-4 mb-5">
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/f.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg c">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Phát triển tư duy kinh doanh, xây dựng đội nhóm vững mạnh, biết cách lựa chọn và sử dụng nhân sự phù hợp</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/g.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg c">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Hiểu sâu về những khả năng tiềm ẩn, phát triển bản lĩnh nhà lãnh đạo, đưa doanh nghiệp đi lên</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/h.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg c">
                                                            <div class="row justify-content-center g-0">
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Định hình sứ mệnh bản thân và doanh nghiệp của mình. Xây dựng được 1 văn hóa doanh nghiệp bền vững và trường tồn</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row g-0 text-white">
                                                        <div class="col-12">
                                                            <img class="w-100" src="/img/post/i.png" alt="">
                                                        </div>
                                                        <div class="col-12 itembg c">
                                                            <div class="row justify-content-center g-0">
                                                                {{-- <div class="col-10">
                                                                    <h3>góc nhìn mới giúp định</h3>
                                                                </div> --}}
                                                                <div class="col-10">
                                                                    <div class="fw-lighter desc1"><span>Hiểu được quy luật vận hành của doanh nghiệp để định hướng chiến lược kinh doanh trong năm nay và 3 năm tiếp theo</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mb-4">
                                        <div class="btn-ketqua text-center mr-0">
                                            <a href="tel:0987654321">
                                                <button>LIÊN HỆ 0987654321</button>
                                            </a>
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

    <div class="service2 ketqua-service" id="san-pham">
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
                                <div class="w-75"><span>Cung cấp đầy đủ 19 chỉ số quan trọng toàn diện nhất dành cho bạn.</span></div>
                            </div>
                            <div class="d-flex">
                                <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                <div class="w-75"><span>Góc nhìn tích cực, xác định bản chất, tư vấn theo quan điểm xây dựng và phát triển bản thân.</span></div>
                            </div>
                            <div class="d-flex">
                                <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                <div class="w-75"><span>Cho bạn lời khuyên 3 năm sắp tới để đạt được đỉnh thành công.</span></div>
                            </div>
                            <div class="d-flex">
                                <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                <div class="w-75"><span>Hiểu sâu sắc bản thân, nhận biết điểm mạnh, điểm yếu để phát triển sức mạnh, năng lực nội tại bên trong bản thân bạn.</span></div>
                            </div>
                            <div class="d-flex">
                                <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                <div class="w-75"><span>Nhận thức năng lực thiên bẩm của bản thân làm chỗ dựa cho đam mê để lựa chọn công việc phù hợp với bạn.</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="block">
                            <div class="d-flex justify-content-center">
                                <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                <div class="w-75"><span>Thấu hiểu con cái, vợ chồng của mình để đạt được hạnh phúc gia đình.</span></div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                <div class="w-75"><span>Được chuyên gia hỗ trợ luận giải và định hướng giải pháp, phát triển đột phá. </span></div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                <div class="w-75"><span>Hiểu rõ và điều phối nhân sự một cách hiệu quả nhất.</span></div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                <div class="w-75"><span>Phát triển tối đa năng lực cá nhân, tạo ra giá trị lớn cho bản thân và xã hội.</span></div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <img height="34" width="34" src="/img/icon/list.png" alt="Thần số học">
                                <div class="w-75"><span>Có được điểm tựa để đi đúng định hướng bạn thân.</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ketqua sanpham">
        <div class="content-ketqua">
            <div class="container container-ketqua">
                <div class="row g-0">
                    <div class="col-xl-12">
                        <div class="share-ketqua text-white">
                            <div class="titlecs text-center"><h4>nhận giải mã trực tiếp</h4></div>
                            <div class="desccs fw-lighter">
                                <div><span>Nếu bạn muốn biết chi tiết hơn về những lời khuyên phù hợp nhất, giải mã vận mệnh, thăng trầm và ý nghĩa từng năm. Khám phá Giải mã chi tiết chuyên sâu ngay.</span></div>
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


</main>

@endsection

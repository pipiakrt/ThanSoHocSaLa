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
                    <button class="text-white">ĐĂNG KÍ</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="group-bg">
    <div class="block-1 text-center text-white">
        <div class="container container-block-1 mh-1150 ">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="text-dark titleheader title-h1">Ý NGHĨA CÁC CHỈ SỐ</h2>
                </div>
                <div class="col-md-6 col-xl-4 col-lg-6">
                    <div class="item active" style="background-image: url('/img/vt/2.png');">
                        <div class="link-to"></div>
                        <div class="box-group">
                            <div class="box">
                                <div class="title">NGÀY SINH</div>
                            </div>
                        </div>
                        <div class="item-drop">
                            <div class="group-item">
                                <div class="drop-title">
                                    <h3>Sứ mệnh</h3>
                                </div>
                                <div class="hr"></div>
                                <div class="drop-desc"><span>Chỉ số này tiết lộ bạn sinh ra để làm gì và trở thành ai trong cuộc đời này. Đây là chỉ số quan trọng thứ 2 trong bản đồ thần số học của bạn và bạn cần xét đến khi lựa chọn nghề nghiệp.</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 col-lg-6">
                    <div class="item" style="background-image: url('/img/vt/2.png');">
                        <div class="link-to"></div>
                        <div class="box-group">
                            <div class="box">
                                <div class="title">
                                    ĐƯỜNG ĐỜI
                                    <div class="desc"><span>Ý nghĩa chỉ số sứ mệnh</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="item-drop">
                            <div class="group-item">
                                <div class="drop-title"><h3>Đường đời</h3></div>
                                <div class="hr"></div>
                                <div class="drop-desc"><span>Chỉ số này hé lộ con đường mà bạn sẽ trải qua trong cuộc đời này. Nó cho bạn thấy bạn sẽ gặp phải những trải nghiệm như thế nào, và bạn học được gì sau những trải nghiệm đó. Đây là chỉ số quan trọng nhất khi bạn xem thần số học của mình. Nó cung cấp nhiều thông tin về con người bạn và cuộc đời mà bạn sẽ sống.
                                </span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 col-lg-6">
                    <div class="item" style="background-image: url('/img/vt/2.png');">
                        <div class="link-to"></div>
                        <div class="box-group">
                            <div class="box">
                                <div class="title">
                                    NHÂN CÁCH
                                    <div class="desc"><span>Ý nghĩa chỉ số nhân cách</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="item-drop">
                            <div class="group-item">
                                <div class="drop-title"><h3>Nhân cách</h3></div>
                                <div class="hr"></div>
                                <div class="drop-desc"><span>Chỉ số này thể hiện cách bạn phản ứng với những gì xảy ra trong cuộc đời mình. Nó độc lập với con số Đường đời và các con số khác, số Thái độ hoàn toàn phụ thuộc vào bạn. Chúng ta không kiểm soát được những gì đến với mình nhưng chúng ta hoàn toàn làm chủ được cách phản ứng với nó nên con số này bạn hoàn toàn có thể phát huy ưu điểm và khắc phục nhược điểm của nó được.</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 col-lg-6">
                    <div class="item" style="background-image: url('/img/vt/2.png');">
                        <div class="link-to"></div>
                        <div class="box-group">
                            <div class="box">
                                <div class="title">
                                    Tâm hồn
                                    <div class="desc"><span>Ý nghĩa chỉ số tâm hồn</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="item-drop">
                            <div class="group-item">
                                <div class="drop-title"><h3>Tâm hồn</h3></div>
                                <div class="hr"></div>
                                <div class="drop-desc"><span>Tâm hồn, sự khao khát từ sâu bên trong của mỗi người. Chỉ số này hé lộ tâm hồn hay sâu thẳm trong bạn mong muốn bạn trở thành con người như thế nào thì mới cảm thấy thỏa mãn và trọn vẹn. Nói cách khác, nếu bạn có những đặc điểm tích cực của chỉ số này, Tâm hồn bạn sẽ cảm thấy hạnh phúc.</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 col-lg-6">
                    <div class="item" style="background-image: url('/img/vt/2.png');">
                        <div class="link-to"></div>
                        <div class="box-group">
                            <div class="box">
                                <div class="title">
                                    TRƯỞNG THÀNH
                                    <div class="desc"><span>Ý nghĩa chỉ số trưởng thành</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="item-drop">
                            <div class="group-item">
                                <div class="drop-title"><h3>Trưởng thành</h3></div>
                                <div class="hr"></div>
                                <div class="drop-desc"><span>Chỉ số này tiết lộ sự trưởng thành và thành đạt của bạn sẽ ở trên phương diện thế nào sau này. Nó cho biết bạn có thể trông đợi điều gì trong nửa sau cuộc đời, bạn cần để tâm tới chỉ số này khi đặt mục tiêu hay đưa ra quyết định trong dài hạn. Chỉ số này của bạn chỉ bắt đầu có ảnh hưởng sau khi bạn đã trưởng thành hay sống được nửa cuộc đời, cụ thể là từ tuổi 45 trở đi. Đây là một dạng năng lượng tích lũy...</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-sanpham />

</div>

<div class="chuyen-gia">
    <div class="row g-0">
        <div class="col-lg-12 col-xl-5 ct-col-5 bg-chuyen-gia">
            <div class="avatar-chuyen-gia position-relative">
                <div class="tt-chuyengia">
                    <div class="fix-center">
                        <div class="name text-center"><h3>NGUYÊN HỒNG</h3></div>
                        <div class="desc"><span>Chuyên gia thần số học SALA</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-5 ct-col-7">
            <div class="info-chuyengia h-100 d-flex align-items-center">
                <div class="block">
                    <h2 class="h1 title-h1 mb-0">CHUYÊN GIA THẦN SỐ HỌC SALA</h2>
                    <div class="hr"></div>
                    <div class="content">
                        <div><span>- Chuyên gia tại “Viện Nghiên Cứu Và Ứng Dụng Tiềm Năng Con Người”</span></div>
                        <div><span>- Giúp đỡ trên 2000 cá nhân thấu hiểu và phát triển bản thân. Giúp họ xác định được nghề nghiệp, hướng đi và mục tiêu trên con đường sự nghiệp.</span></div>
                        <div><span>- Giúp đỡ trên 300 gia đình yêu thương, gắn kết với nhau. Giúp cha mẹ hiểu con cái mình hơn và làm cách nào để định hướng đường đời cho con mình một cách đúng đắn</span></div>
                        <div><span>- Giúp đỡ trên 50 doanh nghiệp tại Hà Nội và các tỉnh phía Bắc định hình được hướng đi, thấu hiểu và điều phối nhân sự hợp lý để phát triển khả năng của nhân viên, từ đó hình thành sự phát triển của doanh nghiệp</span></div>
                        <div><span>- Là đối tác cấp cao tại: Ngân hàng (MB, MSB, VIB, Seabank); Bảo hiểm (Manulife, Dai Ichi, Bảo Việt); các doanh nghiệp (Panda Uniform,  Sapo, Misa)</span></div>
                    </div>
                    <div class="btn-view">
                        <button class="btn">XEM THÊM</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="taisao">
    <div class="container">
        <div class="titleheader text-dark text-center">
            <h2 class="title-h1">Gía trị chỉ có khi làm Thần Số Học tại SALA GROUP</h2>
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

<div class="form-tracuu" id="form-tracuu">
    <div class="container container-header text-lights">
        <div class="_mb-8">
            <iframe class="w-100 m-0 youtube-responsive" height="750" src="https://www.youtube.com/embed/rwEfiiqJJK8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <!--  -->
        <form class="main-tracuu d-flex align-items-center justify-content-center" action="?">
            <div class="w-100">
                <div class="row g-0">
                    <div class="col-lg-12 col-xl-4 ct-col-4">
                        <h1 class="text-white mb-0 mb-md-4">ĐĂNG KÍ TRA CỨU THẦN SỐ HỌC</h1>
                    </div>
                    <div class="col-lg-4 col-xl-3 ct-col-3">
                        <div class="mb-2">
                            <input class="custom-form-input mb-4" type="text" placeholder="Họ và tên:">
                        </div>
                        <div class="mb-2 mb-lg-0">
                            <input class="custom-form-input mb-4 mb-lg-0" type="text" placeholder="Số điện thoại:">
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3 ct-col-3">
                        <div class="mb-2">
                            <input class="custom-form-input mb-4" type="email" placeholder="Email:">
                        </div>
                        <div class="mb-2 mb-lg-0">
                            <input id="ngaygio" class="custom-form-input mb-4 mb-lg-0"  type="date">
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-2 ct-col-2">
                        <div class="d-flex align-items-center h-100 w-100">
                            <button type="submit" class="btn-tracuu w-100">GIẢI MÃ NGAY</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

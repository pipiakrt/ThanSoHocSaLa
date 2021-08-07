@extends('layouts.app')

@section('content')
@push('styles')
    <link rel="stylesheet" href="/css/postDetail.css">
@endpush

<x-slogan />

<div class="main-postDetail py-5">
    <div class="container container-postDetail">
        <div class="sliders">
            <div id="sliders" class="owl-carousel owl-theme">
                <div class="item">
                    <img class="header-logo" alt="Thần Số Học" src="/img/banner/post.png">
                </div>
                <div class="item">
                    <img class="header-logo" alt="Thần Số Học" src="/img/banner/post.png">
                </div>
                <div class="item">
                    <img class="header-logo" alt="Thần Số Học" src="/img/banner/post.png">
                </div>
            </div>
        </div>
        <div class="postDetailInfo">
            <div class="row g-0">
                <div class="col-md-4 text-end">
                    <img class="picateo" src="/img/banner/pitago.png" alt="">
                </div>
                <div class="col-md-5 text-center">
                    <div class="text-white">
                        <div class="info_title">
                            <h2 class="text-uppercase">Thần Số Học</h2>
                        </div>
                        <div class="info_desc fw-lighter text-start">
                            <span>Từ xa xưa, con người đã biết ứng dụng Thần Số Học - một công trình nghiên cứu vĩ đại của nhà Toán học, triết học, thần học Pythagoras vào cuộc sống để thấu hiểu bản thân và tìm ra con đường tốt nhất cho chính mình. Ngày nay Thần Số Học được áp dụng rộng rãi tại các nước phương Tây và vài năm gần đây, bộ môn này bắt đầu được tiếp nhận tại đất nước Việt Nam. Vậy Thần Số Học là gì? Và tại sao con người lại tin vào Thần Số Học đến thế?</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="postImage mt-3">
            <img class="mw-100" src="/img/banner/post-2.png" alt="">
        </div>

        <div class="khai_niem bg-white">
            <div class="row g-0 justify-content-center text-center">
                <div class="col-md-7">
                    <div class="titleKN"><h2>KHÁI NIỆM THẦN SỐ HỌC</h2></div>
                    <div class="descKN"><span>Thần Số Học từ lâu đã được biết đến là một bộ môn khoa học, nghiên cứu về mối tương quan giữa các con số và sự rung động của chúng. Chúng giúp bạn hiểu được ý nghĩa của các con số xuất hiện trong cuộc sống và được coi là chìa khoá để giúp chúng ta giải mã Vũ trụ cũng như tìm ra mục đích sống, khả năng thiên bẩm của bản thân và linh hồn.</span></div>
                    <div class="descKN"><span>Thần Số Học sẽ giúp bạn giải thích việc bạn liên tục nhìn thấy sự lặp lại của các con số, như: 11 hoặc 22 hay 33,... Hay chúng cũng sẽ giúp bạn biết ý nghĩa về ngày sinh của mình cùng những thành viên trong gia đình bạn. Từ đó bạn thấy rằng, các con số không phải ngẫu nhiên xuất hiện trong cuộc sống của bạn và chúng chính là thông điệp mà vũ trụ muốn gửi đến bạn.</span></div>
                    <div class="descKN"><span>Khi bạn đã hiểu những thông điệp mà vũ trụ gửi đến mình thông qua các con số, bạn cũng sẽ biết điều chỉnh và đón nhận những thông số này để giúp bạn nhận ra những tiềm năng lớn nhất mà bạn có thể đạt được. Ngoài ra, mỗi con số đều sẽ có một chủ đề, một ý nghĩa và một hình mẫu riêng, phụ thuộc vào vị trí của bạn trong mỗi chu kỳ cá nhân của mình.</span></div>
                    <div class="descKN"><span>Ngoài ra, có lẽ bạn chưa biết rằng tên khai sinh hay tên thường gọi của bạn cũng có ý nghĩa quan trọng trong cuộc đời bạn và thông qua các con số bạn sẽ diễn giải được giá trị của các con số trong tên gọi của mình. Thậm chí, khi bạn hiểu về Thần Số Học bạn cũng sẽ biết rằng, mỗi con số trên lịch đều có sự liên kết với năng lượng cá nhân, từ đó bạn biết được ngày nào bạn sẽ làm việc, sinh hoạt hay hoạt động tốt hơn những ngày khác. </span></div>
                    <div class="descKN"><span>Tóm tắt lại, thì Thần Số Học sẽ giúp bạn hiểu rõ được bản thân và những người xung quanh. Chúng cũng sẽ giúp bạn khai thác và tối đa hoá được tiềm năng cao nhất của bản thân mình, giúp bạn đưa ra những lựa chọn thông minh hơn. Bên cạnh đó, thông qua bộ môn này bạn cũng sẽ phát hiện ra những con số Thách Thức của bản thân và đón nhận sự thay đổi của bạn thân một các tốt nhất. Bạn cũng sẽ hiểu và suy ngẫm về các sự kiện trong cuộc đời mình, tại sao thời điểm đó lại xảy ra những sự kiện đấy? Bạn cũng dự đoán được những thử thách sắp tới của mình, những sự kiện sẽ xảy ra trong một năm, hay trong một chu kỳ của bản thân từ đó sẽ tận dụng được tối đa những cơ hội tuyệt vời và bổ ích.</span></div>
                    <div class="descKN"><span>Tuy nhiên, hãy nhớ rằng Thần Số Học không phải là duy tâm và chúng không dự đoán được tương lai. Thần Số Học chỉ là dự đoán tiềm năng của bạn và phần còn lại là phụ thuộc vào chính bản thân bạn. Chúng cung cấp cho bạn một khuôn khổ, tuy nhiên còn phải phụ thuộc vào nhiều yếu tố: ý chí, sự lựa chọn hay các yếu tố môi trường nằm ngoài tầm kiểm soát của bạn.</span></div>
                </div>
            </div>
        </div>
    </div>

    <div class="nguon_goc bg-white py-5">
        <div class="row g-0 justify-content-center">
            <div class="col-md-8">
                <div class="px-2 px-lg-5">
                    <div class="titleNG text-center">
                        <h2>NGUỒN GỐC THẦN SỐ HỌC</h2>
                    </div>
                    <div class="row g-0 mt-5">
                        <div class="col-md-5">
                            <div>
                                <div class="desc"><span>Thần Số Học (Numerology) là một hệ thống cổ xưa đã được sử dụng hàng ngàn năm, trải dài trên toàn cầu. Các ghi chép số học đã được tìm thấy ở Babylon và Ai Cập, và có bằng chứng sự tồn tại của nó cách đây hàng nghìn năm ở Hy Lạp, La Mã, Nhật Bản và Trung Quốc.</span></div>
                                <div class="desc"><span>Người Chaldean hay được gọi là người Babylon đã nghiên cứu sâu về cả chiêm tinh học, số học và thực sự là những người đầu tiên xác định mối tương quan giữa các con số với dao động của vũ trụ nên còn được gọi là Chaldean Numerology. Qua nhiều thời đại, số học đã phát triển và được biết đến với tên tuổi của Pythagoras.</span></div>
                                <div class="desc"><span>Ông là một triết gia, nhà toán học người Hy Lạp sống trong thời đại 590 trước công nguyên đã biết đến Chaldean và xây dựng trên nó, bổ xung các triết lý và toán học của riêng mình do đó hình thành hệ số Pythagoras. Theo thuyết học Pythagoras, mọi con số, bất kể lớn hay nhỏ luôn có thể rút gọn được thành 1 chữ số từ 1 đến 9, và mỗi chữ số rút gọn đó mang rung động vũ trụ riêng.</span></div>
                                <div class="desc"><span>Vào đầu những năm 1900, tiến sĩ Julian Stenton đã ghi lại các yếu tố khác nhau của số học và phổ biến nó, đặt ra thuật ngữ "Numerology". Từ những năm 1970 số học đã được mọi người ở mọi tầng lớp xã hội sử dụng như một công cụ tự trợ giúp được cá nhân hóa. "Các con số không nói dối" là một tuyên bố sâu sắc của các nhà nghiên cứu, khẳng định con số biểu lộ tính cách và các sự kiện mà con người trải qua với độ chính xác đáng kinh ngạc.</span></div>
                                <div class="desc"><span>Ngày nay, Numerology được thực hành trên khắp thế giới và được hàng triệu người sử dụng để giúp cho cuộc sống trở nên tốt đẹp hơn.</span></div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <img class="mw-100" src="/img/banner/post-3.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <img class="mw-100" src="/img/gioithieu/ct1.png" alt="">
    </div>

</div>

@endsection

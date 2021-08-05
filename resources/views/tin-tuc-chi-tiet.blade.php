@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="/css/post2.css">
    <link rel="stylesheet" href="/css/postDetail2.css">
    <style>
        .title-lienquan {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
            overflow: hidden;
        }
        .desc-lienquan {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
            overflow: hidden;
        }
        .tags{
            border: 1px solid silver;
            padding: 10px 15px;
        }
    </style>
@endpush

@section('content')

    <nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <div class="container container-header2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                @if (request()->segment(1) == 'gioi-thieu')
                    <li class="breadcrumb-item"><a href="/gioi-thieu/">Giơi thiệu</a></li>
                @else
                    <li class="breadcrumb-item"><a href="/tin-tuc">{{ $post->type == 'post' ? 'Tin tức' : 'Câu chuyện' }}</a></li>
                @endif
                <li class="breadcrumb-item"><a href="#">{{ $post->name }}</a></li>
            </ol>
        </div>
    </nav>
    <main>
        <div class="post-slogan post-sloganDetail">
            <div class="container container-header2 mb-4">
                <div class="row g-0 g-md-5">
                    <div class="col-md-6 bg-white">

                        <fieldset class="w-100 mt-4 tags">
                            <legend><b>Thần Số Học</b></legend>
                            <div class="section row">
                                <div class="col-md-12">
                                    <div style="padding: 0px; width: 100%;">
                                        <ol style="max-height: 180px; height: auto; overflow: auto; line-height: 32px;" id="queue">
                                            <li><a style="color: #b00104;" href="/huyen-hoc/than-so-hoc/bai-1-kham-pha-ban-than-thong-qua-nhung-con-so-956.html">Bài 1: Khám Phá Bản Thân Thông Qua Những Con Số</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/bai-2-y-nghia-cac-so-tu-nhien-theo-numerology-957.html">Bài 2: Ý Nghĩa Các Số Tự Nhiên Theo Numerology</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/bai-3-ba-the-cua-ban-than-three-aspects-of-self-958.html">Bài 3: Ba Thể Của Bản Thân (Three Aspects Of Self)</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/bai-4-con-so-chu-dao-your-ruling-number-959.html">Bài 4: Con Số Chủ Đạo Your Ruling Number</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/bai-5-con-so-chu-dao-9-960.html">Bài 5: Con Số Chủ Đạo: 9</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/bai-6-con-so-chu-dao-8-961.html">Bài 6: Con Số Chủ Đạo 8</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/bai-7-con-so-chu-dao-7-962.html">Bài 7: Con Số Chủ Đạo: 7</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/bai-8-con-so-chu-dao-6-963.html">Bài 8: Con Số Chủ Đạo: 6</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/bai-9-con-so-chu-dao-5-964.html">Bài 9: Con Số Chủ Đạo: 5</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/bai-10-con-so-chu-dao-4-965.html">Bài 10: Con Số Chủ Đạo: 4</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/bai-11-con-so-chu-dao-3-966.html">Bài 11: Con Số Chủ Đạo: 3</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/bai-12-con-so-chu-dao-2-967.html">Bài 12: Con Số Chủ Đạo: 2</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/bai-13-con-so-chu-dao-10-968.html">Bài 13: Con Số Chủ Đạo: 10</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/bai-14-con-so-chu-dao-1-1-969.html">Bài 14: Con Số Chủ Đạo: 1-1</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/bai-15-con-so-chu-dao-2-24-970.html">Bài 15 Con Số Chủ Đạo: 2-2/4</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/bai-16-birth-chart-971.html">Bài 16: Birth Chart</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/bai-17-diem-danh-cac-so-co-mat-va-vang-mat-trong-bieu-do-ngay-sinh-972.html">Bài 17: Điểm Danh Các Số Có Mặt Và Vắng Mặt Trong Biểu Đồ Ngày Sinh</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/bai-18-so-1-trong-bieu-do-ngay-sinh-973.html">Bài 18: Số 1 Trong Biểu Đồ Ngày Sinh</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/bai-19-so-2-trong-bieu-do-ngay-sinh-974.html">Bài 19: Số 2 Trong Biểu Đồ Ngày Sinh</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/bai-20-so-3-trong-bieu-do-ngay-sinh-975.html">Bài 20: Số 3 Trong Biểu Đồ Ngày Sinh</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/bai-21-so-4-trong-bieu-do-ngay-sinh-976.html">Bài 21: Số 4 Trong Biểu Đồ Ngày Sinh</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/bai-22-so-5-trong-bieu-do-ngay-sinh-977.html">Bài 22: Số 5 Trong Biểu Đồ Ngày Sinh</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/bai-23-so-6-trong-bieu-do-ngay-sinh-978.html">Bài 23: Số 6 Trong Biểu Đồ Ngày Sinh</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/bai-24-so-7-trong-bieu-do-ngay-sin-979.html">Bài 24: Số 7 Trong Biểu Đồ Ngày Sin</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/bai-25-so-8-trong-bieu-do-ngay-sinh-980.html">Bài 25: Số 8 Trong Biểu Đồ Ngày Sinh</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/bai-26-so-9-trong-bieu-do-ngay-sinh-982.html">Bài 26: Số 9 Trong Biểu Đồ Ngày Sinh</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/cac-mui-ten-chi-ca-tinh-bai-28-mui-ten-trong-so-1-5-9-983.html">Các Mũi Tên Chỉ Cá Tính: Bài 28: Mũi Tên Trống Số 1-5-9</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/cac-mui-ten-chi-ca-tinh-bai-27-mui-ten-chi-su-quyet-tam-984.html">Các Mũi Tên Chỉ Cá Tính: Bài 27: Mũi Tên Chỉ Sự Quyết Tâm</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/mui-ten-chi-ca-tinh-bai-29-mui-ten-3-5-7-mui-ten-chi-su-nhay-ben-tam-linh-985.html">Mũi Tên Chỉ Cá Tính: Bài 29: Mũi Tên 3-5-7. Mũi Tên Chỉ Sự Nhạy Bén Tâm Linh</a></li>
                                            <li>
                                                <a href="/huyen-hoc/than-so-hoc/cac-mui-ten-chi-ca-tinh-bai-30-mui-ten-trong-3-5-7-mui-ten-chi-tinh-hay-hoai-nghi-986.html">Các Mũi Tên Chỉ Cá Tính: Bài 30: Mũi Tên Trống 3-5-7. Mũi Tên Chỉ Tính Hay Hoài Nghi</a>
                                            </li>
                                            <li><a href="/huyen-hoc/than-so-hoc/mui-ten-chi-ca-tinh-bai-31-mui-ten-3-6-9-mui-ten-chi-su-sang-tri-987.html">Mũi Tên Chỉ Cá Tính: Bài 31: Mũi Tên 3-6-9. Mũi Tên Chỉ Sự Sáng Trí</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/mui-ten-chi-ca-tinh-bai-32-mui-ten-trong-3-6-9-mui-ten-chi-tri-nho-ngan-han-988.html">Mũi Tên Chỉ Cá Tính: Bài 32: Mũi Tên Trống 3-6-9. Mũi Tên Chỉ Trí Nhớ Ngắn Hạn</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/tap-25-mui-ten-1-5-9-1013.html">Tập 25: Mũi Tên 1-5-9</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/tap-26-mui-ten-trong-1-5-9-1014.html">Tập 26: Mũi Tên Trống 1-5-9</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/tap-27-mui-ten-3-5-7-1015.html">Tập 27: Mũi Tên 3-5-7</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/tap-28-mui-ten-trong-3-5-7-1016.html">Tập 28: Mũi Tên Trống 3-5-7</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/tap-29-mui-ten-3-6-9-1017.html">Tập 29: Mũi Tên 3-6-9</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/tap-30-mui-ten-trong-3-6-9-1018.html">Tập 30: Mũi Tên Trống 3-6-9</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/tap-31-mui-ten-can-bang-cam-xuc-1019.html">Tập 31: Mũi Tên Cân Bằng Cảm Xúc</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/tap-32-mui-ten-nhay-cam-trong-2-5-8-1020.html">Tập 32: Mũi Tên Nhạy Cảm (Trống 2-5-8)</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/tap-33-mui-ten-thuc-te-1-4-7-1021.html">Tập 33: Mũi Tên Thực Tế (1-4-7)</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/tap-34-mui-ten-chi-su-hon-don-1022.html">Tập 34: Mũi Tên Chỉ Sự Hỗn Độn</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/tap-35-mui-ten-ke-hoach-1-2-3-1023.html">Tập 35: Mũi Tên Kế Hoạch (1-2-3)</a></li>
                                            <li><a href="/huyen-hoc/than-so-hoc/tap-36-mui-ten-y-chi-4-5-6-1025.html">Tập 36: Mũi Tên Ý Chí (4-5-6)</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </fieldset>


                        @if ($post->type == 'story')
                            <div class="title">
                                <h1>{{ $post->author }}</h1>
                            </div>
                        @endif
                        <div class="post-content pb-0 pt-2">
                            <div class="desc-1">
                                <h3>{{ $post->name }}</h3>
                            </div>
                            <div class="desc fw-lighter mb-5">
                                <span>{{ $post->description }}</span>
                            </div>
                        </div>
                        <div class="post-content">
                            {!! $post->content !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <x-danh-muc />
                        <div class="list-group list-group-flush border-bottom scrollarea">
                            @foreach ($posts as $item)
                                @if ($item->id != $post->id)
                                    <a href="/tin-tuc/{{ $item->slug }}" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                                        <div class="row g-0">
                                            <div class="col-9">
                                                <div class="col-11">
                                                    <strong class="mb-1 title-lienquan">{{ $item->name }}</strong>
                                                </div>
                                                <div class="col-11 small desc-lienquan">{{ $item->description }}</div>
                                            </div>
                                            <div class="col-3">
                                                <img style="max-width: 100px" src="{{ $item->image ? $item->image : '/img/post/1.png' }}" alt="">
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>

@endsection

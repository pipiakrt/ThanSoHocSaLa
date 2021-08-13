
<div class="service2" id="san-pham">
    <div class="container container-header2 h-100 px-2 d-none d-xl-block">
        <div class="titleheader text-dark text-center">
            <h2 class="title-h1">CÁC GÓI SẢN PHẨM</h2>
        </div>

        <div class="block-main-crsv">
            <div class="row g-0 text-white">
                <div class="ct-col-3 col-xl-3">
                    <div class="row g-0 h-100">
                        @foreach ($products as $key => $item)
                            <div class="col-12">
                                <div class="eventItem2 item {{ $key == 0 ? 'active' : '' }}" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="{{ $key }}">
                                    <div class="box">
                                        <div class="icon-logo">
                                            <img src="{{ $key == 0 ? '/img/icon/sv-1.png' : '/img/icon/sv-3.png' }}" alt="Thần số học">
                                        </div>
                                        <div class="group-content">
                                            <div class="desc"><span>Gói {{ $key + 1 }}</span></div>
                                            <div class="title"><h4>{{ $item->name }}</h4></div>
                                        </div>
                                        <div class="toLink">
                                            <img src="/img/icon/link.png" alt="Thần số học">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="ct-col-9 col-xl-9">
                    <div id="carouselExampleCaptions2" class="carousel slide text-dark h-100" data-bs-interval="false" data-bs-ride="carousel">
                        <div class="carousel-inner h-100">
                            @foreach ($products as $key => $item)
                                <div class="carousel-item h-100 {{ $key == 0 ? 'active' : '' }}">
                                    <div class="row g-0 text-white text-center h-100">
                                        <div class="col-xl-7 h-100">
                                            <div class="box-item">
                                                <div class="block-item">
                                                    <div class="giamgia">
                                                        <div class="giamgia-g">
                                                            <div class="title-1 gc">
                                                                <span>{{ $item->price_origin }}</span>
                                                            </div>
                                                            <div class="title-1">
                                                                <span>Giảm còn</span>
                                                            </div>
                                                            <div class="title-2">
                                                                <h3>{{ $item->price }}</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="khuyenmsi"></div>
                                                    <div class="quatang">
                                                        <div class="title-3"><h2>{{ $item->promotion[0]["title"] }}</h2></div>
                                                        <div class="fix-mgauto text-start">
                                                            @foreach ($item->promotion[0]["options"] as $promotion)
                                                                <div class="group-qt">
                                                                    <img src="/img/icon/tick.png" alt="Quà tặng">
                                                                    <div class="desc-1"><span>{{ $promotion["key"] }}</span></div>
                                                                    <div class="price-1"><span>{{ $promotion["val"] }}</span></div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="total">
                                                            <div class="total-text"><span>Tổng giá trị quà tặng</span></div>
                                                            <div class="total-price"><h2>{{ $item->promotion[0]["total"] }}</h2></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 h-100">
                                            <div class="anhsp h-100 text-center" style="background-image: url('/img/kh/2.jpg');">
                                                <div class="row g-0 position-absolute end-0 start-0 bottom-0">
                                                    <div class="col-md-6 position-relative">
                                                        <a href="/tai-khoan/gio-hang/{{ $item->slug }}">
                                                            <button>Đặt Hàng</button>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-6 position-relative">
                                                        <a href="/san-pham/{{ $item->slug }}">
                                                            <button style="background-color: #097364;">Chi tiết</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($products as $key => $item)
        <div class="container container-header2 h-100 px-2 d-block d-xl-none {{ $key == 0 ? '' : 'mt-4' }}">
            <div class="titleheader text-dark text-center">
                <h2 class="title-h1">{{ $item->name }}</h2>
            </div>
            <div class="block-main-crsv">
                <div class="row g-0 text-white">
                    <div class="ct-col-9 col-xl-9">
                        <div id="carouselExampleCaptions2" class="carousel slide text-dark h-100" data-bs-interval="false" data-bs-ride="carousel">
                            <div class="carousel-inner h-100">
                                <div class="carousel-item active h-100">
                                    <div class="row g-0 text-white text-center">
                                        <div class="col-xl-7 h-100">
                                            <div class="box-item">
                                                <div class="block-item">
                                                    <div class="giamgia">
                                                        <div class="giamgia-g">
                                                            <div class="title-1 gc">
                                                                <span>{{ $item->price_origin }}</span>
                                                            </div>
                                                            <div class="title-1">
                                                                <span>Giảm còn</span>
                                                            </div>
                                                            <div class="title-2">
                                                                <h3>{{ $item->price }}</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="khuyenmsi"></div>
                                                    <div class="quatang">
                                                        <div class="title-3"><h2>{{ $item->promotion[0]["title"] }}</h2></div>
                                                        <div class="fix-mgauto text-start">
                                                            @foreach ($item->promotion[0]["options"] as $promotion)
                                                                <div class="group-qt">
                                                                    <img src="/img/icon/tick.png" alt="Quà tặng">
                                                                    <div class="desc-1"><span>{{ $promotion["key"] }}</span></div>
                                                                    <div class="price-1"><span>{{ $promotion["val"] }}</span></div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="total">
                                                            <div class="total-text"><span>Tổng giá trị quà tặng</span></div>
                                                            <div class="total-price"><h2>{{ $item->promotion[0]["total"] }}</h2></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-0">
                                                    <div class="col-6 position-relative">
                                                        <a href="/tai-khoan/gio-hang/{{ $item->slug }}">
                                                            <button class="btn-sanpham">Đặt Hàng</button>
                                                        </a>
                                                    </div>
                                                    <div class="col-6 position-relative">
                                                        <a href="/san-pham/{{ $item->slug }}">
                                                            <button class="btn-sanpham bg-white" style="color: #097364">Chi tiết</button>
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
            </div>
        </div>
    @endforeach
</div>

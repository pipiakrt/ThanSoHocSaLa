<div class="carousel-item h-100 {{ $key == 0 ? 'active' : '' }}">
    <div class="item px-0 px-md-4 py-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="title text-center py-4">
                    @foreach ($item["options"]["title"] as $val)
                        <h5 class="hd1">{{ $val["name"] }}</h5>
                    @endforeach
                </div>
            </div>
            <div class="col-md-12 position-relative">
                <div class="row g-0 justify-content-center g-lg-4">
                    @foreach ($item["options"]["desc"] as $desc)
                        <div class="col-sm-12 col-md-6 col-xl-4 px-4 position-relative bg-ctm">
                            <div class="image">
                                <div class="avatar" style="background-image: url('{{ $desc["avatar"] }}');"></div>
                            </div>
                            <div class="title position-relative">
                                @foreach ($desc["name"] as $name)
                                    <h4>{{ $name["name"] }}</h4>
                                @endforeach
                            </div>
                            <div class="desc">
                                <ul class="list-group">
                                    @foreach ($desc["desc"] as $desc)
                                        <li><span>{{ $desc["name"] }}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-11 px-0 mt-5">
                <div class="titlea text-center">
                    <div>
                        @foreach ($item["options"]["title2"] as $val)
                            <div class="gr-tl"><span>{{ $val["name"] }}</span></div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="title text-center py-5 mt-4">
                    <h3>{{ $item["options"]["desc2"]["name"] }}</h3>
                </div>
            </div>
            <div class="col-12">
                <div class="w-100">
                    <div class="row g-0 justify-content-center g-lg-4">
                        @foreach ($item["options"]["desc2"]["items"] as $items)
                            <div class="col-md-3">
                                <div class="row g-0 text-white">
                                    <div class="col-12">
                                        <img class="w-100" src="{{ $items["avatar"] }}" alt="">
                                    </div>
                                    <div class="col-12 itembg">
                                        <div class="row justify-content-center g-0">
                                            <div class="col-10">
                                                <div class="fw-lighter desc1"><span>{{ $items["name"] }}</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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

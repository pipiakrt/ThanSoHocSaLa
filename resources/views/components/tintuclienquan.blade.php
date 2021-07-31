<div class="post-relate">
    <div class="container container-postDetail">
        <div class="relate-title"><h3>CÓ THỂ BẠN MUỐN XEM?</h3></div>
        <div class="row g-0 g-sm-4 mt-4">
            @foreach ($posts as $item)
                <div class="col-md-6">
                    <div class="relate-item">
                        <div class="row g-0 g-lg-4">
                            <div class="col-lg-12 col-xl-6">
                                <div class="post-image" style="background-image: url('{{ $item->image ? $item->image : '/img/post/1.png' }}');"></div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="item-name mt-4 mt-lg-0 ">
                                    <h3>{{ $item->author }}</h3>
                                </div>
                                <div class="item-title">
                                    <h5>{{ $item->name }}</h5>
                                </div>
                                <div class="item-desc fw-lighter">
                                    <span>{{ $item->description }}</span>
                                </div>
                                <div class="item-btn">
                                    <a href="/">XEM THÊM</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

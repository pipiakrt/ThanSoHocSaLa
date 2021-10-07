<div class="post-item mb-5">
    <div class="row g-0 g-md-3">
        <div class="col-md-4">
            <div class="image">
                <img class="mw-100" src="{{ $item->image ? $item->image : '/img/post/1.png' }}" alt="{{ $item->name }}">
            </div>
        </div>
        <div class="col-md-8 col-lg-7 d-flex align-items-center">
            <div class="post-preview mt-4 mt-md-0">
                <div class="post-name">
                    <a href="{{ $item->slug }}"><h2>{{ $item->name }}</h2></a>
                </div>
                <div class="post-desc"><span>{{ $item->description }}</span></div>
                <div class="submit-post">
                    <a href="{{ $item->slug }}">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
</div>

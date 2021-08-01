<div class="sliders">
    <div id="sliders" class="owl-carousel owl-theme">
        @foreach ($sliders as $item)
            <div class="item">
                <img class="header-logo" alt="Thần Số Học" src="{{ $item->path }}">
            </div>
        @endforeach
    </div>
</div>

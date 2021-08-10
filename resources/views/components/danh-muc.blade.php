
@push('styles')
    <link rel="stylesheet" href="/css/danh-muc.css">
@endpush

<div class="ibox float-e-margins">
    <div class="ibox-content">
        <div class="file-manager my-2">
            <h5>Danh mục</h5>
            <ul class="folder-list" style="padding: 0;">
                @foreach ($categories as $item)
                    <li>
                        <a class="{{ request()->segment(2) == $item->slug ? 'active' : '' }}" href="/tin-tuc/{{ $item->slug }}/"><i class="fa fa-folder"></i> {{ $item->name }}</a>
                    </li>
                @endforeach
            </ul>
            <h5 class="tag-title">Tags</h5>
            <ul class="tag-list" style="padding: 0;">
                <li><a href="">Thần số học</a></li>
                <li><a href="">Chính sách</a></li>
                <li><a href="">Tin tức hot</a></li>
                <li><a href="">Phẩn hồi</a></li>
                <li><a href="">Tuyển dụng</a></li>
                <li><a href="">Tra cứu</a></li>
                <li><a href="">Khuyên mãi</a></li>
                <li><a href="">Phản hồi</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

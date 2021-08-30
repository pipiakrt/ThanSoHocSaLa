
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
            {{-- <h5 class="tag-title">Tags</h5>
            <ul class="tag-list" style="padding: 0;">
                @foreach ($tags as $item)
                    <li><a class="{{ request()->segment(2) == $item->name ? 'active' : '' }}" href="/tin-tuc/{{ $item->name }}">{{ $item->name }}</a></li>
                @endforeach
            </ul> --}}
            <div class="clearfix"></div>
        </div>
    </div>
</div>

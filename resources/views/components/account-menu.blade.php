<h4 class="d-flex justify-content-between align-items-center mb-3">
    <span class="text-muted">{{ request()->user()->name }}</span>
</h4>
<ul class="list-group mb-3">
    <li class="list-group-item d-flex justify-content-between {{ request()->segment(2) == null ? 'bg-light' : 'lh-condensed' }}">
        <a href="/tai-khoan/">
            <span class="{{ request()->segment(2) == '' ? 'text-success' : '' }}">Thông tin tài khoản</span>
        </a>
    </li>
    <li class="list-group-item d-flex justify-content-between {{ request()->segment(2) == 'gio-hang' ? 'bg-light' : 'lh-condensed' }}">
        <a href="/tai-khoan/gio-hang/">
            <span class="{{ request()->segment(2) == 'gio-hang' ? 'text-success' : '' }}">Thanh toán</span>
        </a>
    </li>
    <li class="list-group-item d-flex justify-content-between {{ request()->segment(2) == 'dich-vu' ? 'bg-light' : 'lh-condensed' }}">
        <a href="/tai-khoan/dich-vu/">
            <span class="{{ request()->segment(2) == 'dich-vu' ? 'text-success' : '' }}">Dịch vụ</span>
        </a>
    </li>
    <li class="list-group-item d-flex justify-content-between {{ request()->segment(2) == 'license' ? 'bg-light' : 'lh-condensed' }}">
        <a href="/tai-khoan/tra-cuu-nang-cao">
            <div class="{{ request()->segment(2) == 'license' ? 'text-success' : '' }}">
                <h6 class="my-0">Tra cứu nâng cao</h6>
                <small class="{{ request()->segment(2) == 'license' ? '' : 'text-muted' }}">bạn có 1 lượt tra cứu</small>
            </div>
        </a>
    </li>
    <li class="list-group-item d-flex justify-content-between {{ request()->segment(2) == 'san-pham-yeu-thich' ? 'bg-light' : 'lh-condensed' }}">
        <span>Lịch sử tra cứu</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <a href="/tai-khoan/export">
            <span>Tải file luận giải</span>
        </a>
        <strong>$20</strong>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <form method="POST" action="/logout">
            @csrf
            <button class="btn p-0" type="submit">
                <span>Đăng xuất</span>
            </button>
        </form>
    </li>
</ul>
{{-- <form class="card p-2">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Nhập code" />
        <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Tra cứu nâng cao</button>
        </div>
    </div>
</form> --}}

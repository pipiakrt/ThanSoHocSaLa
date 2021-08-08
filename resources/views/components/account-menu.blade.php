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
        <a href="/tai-khoan/gio-hang">
            <div class="{{ request()->segment(2) == 'gio-hang' ? 'text-success' : '' }}">
                <h6 class="my-0">Đơn hàng chờ xử lý</h6>
                <small class="{{ request()->segment(2) == 'gio-hang' ? '' : 'text-muted' }}">bạn đang có {{ request()->user()->Order()->where('status', 0)->count() }} đơn hàng chờ xử lý</small>
            </div>
        </a>
    </li>
    <li class="list-group-item d-flex justify-content-between {{ request()->segment(2) == 'dich-vu' ? 'bg-light' : 'lh-condensed' }}">
        <a href="/tai-khoan/dich-vu">
            <div class="{{ request()->segment(2) == 'dich-vu' ? 'text-success' : '' }}">
                <h6 class="my-0">Đơn hàng hoạt động</h6>
                <small class="{{ request()->segment(2) == 'dich-vu' ? '' : 'text-muted' }}">bạn đang có {{ request()->user()->Order()->where('status', 1)->count() }} đơn hàng hoạt động</small>
            </div>
        </a>
    </li>
    <li class="list-group-item d-flex justify-content-between {{ request()->segment(2) == 'tra-cuu-nang-cao' ? 'bg-light' : 'lh-condensed' }}">
        <a href="/tai-khoan/tra-cuu-nang-cao">
            <div class="{{ request()->segment(2) == 'tra-cuu-nang-cao' ? 'text-success' : '' }}">
                <h6 class="my-0">Tra cứu nâng cao</h6>
                <small class="{{ request()->segment(2) == 'tra-cuu-nang-cao' ? '' : 'text-muted' }}">bạn còn {{ request()->user()->License->number }} lượt tra cứu</small>
            </div>
        </a>
    </li>
    <li class="list-group-item d-flex justify-content-between {{ request()->segment(2) == 'lich-su-tra-cuu' ? 'bg-light' : 'lh-condensed' }}">
        <a href="/tai-khoan/lich-su-tra-cuu">
            <div class="{{ request()->segment(2) == 'lich-su-tra-cuu' ? 'text-success' : '' }}">
                <h6 class="my-0">Lịch sử tra cứu</h6>
                <small class="{{ request()->segment(2) == 'lich-su-tra-cuu' ? '' : 'text-muted' }}">bạn đã tra cứu {{ request()->user()->TraCuu->count() }}/{{ request()->user()->License->number }} lượt</small>
            </div>
        </a>
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

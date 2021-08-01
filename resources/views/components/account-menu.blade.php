<h4 class="d-flex justify-content-between align-items-center mb-3">
    <span class="text-muted">{{ request()->user()->name }}</span>
</h4>
<ul class="list-group mb-3">
    <li class="list-group-item d-flex justify-content-between {{ request()->segment(2) == null ? 'bg-light' : 'lh-condensed' }}">
        <a href="/tai-khoan/">
            <div class="{{ request()->segment(2) == null ? 'text-success' : '' }}">
                <h6 class="my-0 mt-1">Thông tin tài khoản</h6>
                <small class="{{ request()->segment(2) == null ? '' : 'text-muted' }}">Brief description</small>
            </div>
        </a>
    </li>
    <li class="list-group-item d-flex justify-content-between {{ request()->segment(2) == 'gio-hang' ? 'bg-light' : 'lh-condensed' }}">
        <a href="/tai-khoan/gio-hang/">
            <div class="{{ request()->segment(2) == 'gio-hang' ? 'text-success' : '' }}">
                <h6 class="my-0">Giỏ hàng</h6>
                <small class="{{ request()->segment(2) == 'gio-hang' ? '' : 'text-muted' }}">Brief description</small>
            </div>
        </a>
    </li>
    <li class="list-group-item d-flex justify-content-between {{ request()->segment(2) == 'don-hang' ? 'bg-light' : 'lh-condensed' }}">
        <a href="/tai-khoan/don-hang/">
            <div class="{{ request()->segment(2) == 'don-hang' ? 'text-success' : '' }}">
                <h6 class="my-0">Đơn hàng</h6>
                <small class="{{ request()->segment(2) == 'don-hang' ? '' : 'text-muted' }}">Brief description</small>
            </div>
        </a>
    </li>
    <li class="list-group-item d-flex justify-content-between {{ request()->segment(2) == 'license' ? 'bg-light' : 'lh-condensed' }}">
        <a href="/tai-khoan/license">
            <div class="{{ request()->segment(2) == 'license' ? 'text-success' : '' }}">
                <h6 class="my-0">license code</h6>
                <small class="{{ request()->segment(2) == 'license' ? '' : 'text-muted' }}">1 lượt tra cứu thần số học</small>
            </div>
        </a>
    </li>
    <li class="list-group-item d-flex justify-content-between {{ request()->segment(2) == 'san-pham-yeu-thich' ? 'bg-light' : 'lh-condensed' }}">
        <span>Sản phẩm yêu thích</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <span>Tải file luận giải</span>
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
<form class="card p-2">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Nhập code" />
        <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Tra cứu nâng cao</button>
        </div>
    </div>
</form>

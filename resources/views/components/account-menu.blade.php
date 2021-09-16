<h4 class="d-flex justify-content-between align-items-center mb-3">
    <span class="text-muted">{{ request()->user()->name }}</span>
</h4>
<ul class="list-group mb-3 group-menu_account">
    <li class="list-group-item d-flex justify-content-between {{ request()->segment(2) == null ? 'bg-light' : 'lh-condensed' }}">
        <a href="/tai-khoan/">
            <span class="{{ request()->segment(2) == '' ? 'text-success' : '' }}">Thông tin tài khoản</span>
        </a>
    </li>
    <li class="list-group-item d-flex justify-content-between {{ request()->segment(2) == 'don-hang' ? 'bg-light' : 'lh-condensed' }}">
        <a href="/tai-khoan/don-hang">
            <div class="{{ request()->segment(2) == 'don-hang' ? 'text-success' : '' }}">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"></path></svg>
                <h6 class="my-0">Đơn hàng chưa thanh toán</h6>
                @if (request()->user()->Order()->whereIn('status', [0, 1])->count() > 0)
                    <small class="{{ request()->segment(2) == 'don-hang' ? '' : 'text-muted' }}">bạn đang có {{ request()->user()->Order()->whereIn('status', [0, 1])->count() }} đơn hàng chờ xử lý</small>
                @endif
            </div>
        </a>
    </li>
    <li class="list-group-item d-flex justify-content-between {{ request()->segment(2) == 'dich-vu' ? 'bg-light' : 'lh-condensed' }}">
        <a href="/tai-khoan/dich-vu">
            <div class="{{ request()->segment(2) == 'dich-vu' ? 'text-success' : '' }}">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"></path></svg>
                <h6 class="my-0">Đơn hàng đã kích hoạt</h6>
                @if (request()->user()->Order()->where('status', 2)->count() > 0)
                    <small class="{{ request()->segment(2) == 'dich-vu' ? '' : 'text-muted' }}">bạn đang có {{ request()->user()->Order()->where('status', 2)->count() }} đơn hàng hoạt động</small>
                @endif
            </div>
        </a>
    </li>
    <li class="list-group-item d-flex justify-content-between {{ request()->segment(2) == 'tra-cuu-nang-cao' ? 'bg-light' : 'lh-condensed' }}">
        <a href="/tai-khoan/tra-cuu-nang-cao">
            <div class="{{ request()->segment(2) == 'tra-cuu-nang-cao' ? 'text-success' : '' }}">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"></path></svg>
                <h6 class="my-0">Tra cứu nâng cao</h6>
                <small class="{{ request()->segment(2) == 'tra-cuu-nang-cao' ? '' : 'text-muted' }}">bạn còn {{ request()->user()->License->number }} lần tra cứu</small>
            </div>
        </a>
    </li>
    <li class="list-group-item d-flex justify-content-between {{ request()->segment(2) == 'lich-su-tra-cuu' ? 'bg-light' : 'lh-condensed' }}">
        <a href="/tai-khoan/lich-su-tra-cuu">
            <div class="{{ request()->segment(2) == 'lich-su-tra-cuu' ? 'text-success' : '' }}">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M13 12h7v1.5h-7zm0-2.5h7V11h-7zm0 5h7V16h-7zM21 4H3c-1.1 0-2 .9-2 2v13c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 15h-9V6h9v13z"></path></svg>
                <h6 class="my-0">Lịch sử tra cứu</h6>
                <small class="{{ request()->segment(2) == 'lich-su-tra-cuu' ? '' : 'text-muted' }}">bạn đã tra cứu {{ request()->user()->TraCuu->count() }} lần</small>
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

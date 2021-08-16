<header class="d-none d-lg-block">
    <nav class="container container-header2">
        <div class="row align-items-center">
            <div class="col-4">
                <div class="row">
                    <div class="col-4 menu-item left">
                        <a href="/">
                            <span>Trang chủ</span>
                        </a>
                    </div>
                    <div class="col-4 menu-item d-flex justify-content-center">
                        <div class="nav-item dropdown">
                            <a href="/gioi-thieu" class="dropdown-toggle {{ request()->segment(1) == 'gioi-thieu' ? 'active' : '' }}" data-bs-toggle1="dropdown">
                                <span>Giới thiệu</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="/gioi-thieu/than-so-hoc">
                                        <span>Thần Số Học Pythagoras</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/gioi-thieu/than-so-hoc-la-gi">
                                        <span>Học viện cổ học Sala</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/gioi-thieu/cuon-sach-cuoc-doi">
                                        <span>Cuốn sách cuộc đời</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-4 menu-item d-flex justify-content-center">
                        <div class="nav-item dropdown">
                            <a href="/san-pham" class="dropdown-toggle {{ request()->segment(1) == 'san-pham' ? 'active' : '' }}" data-bs-toggle1="dropdown">
                                <span>Sản phẩm</span>
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($products as $item)
                                    <li>
                                        <a class="dropdown-item" href="/san-pham/{{ $item->slug }}">
                                            <span>{{ Str::title($item->name) }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 text-center">
                <a href="/">
                    <img class="logo-desktop" src="/img/header/logo.png" alt="Logo Thần Số Học">
                </a>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-4 menu-item d-flex justify-content-center">
                        <div class="nav-item dropdown">
                            <a href="/tin-tuc" class="dropdown-toggle {{ request()->segment(1) == 'tin-tuc' ? 'active' : '' }}" data-bs-toggle1="dropdown">
                                <span>Tin tức</span>
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($categories as $item)
                                    <li>
                                        <a class="dropdown-item" href="/tin-tuc/{{ $item->slug }}">
                                            <span>{{ $item->name }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-4 menu-item right text-end">
                        <a href="/cau-chuyen" class="{{ request()->segment(1) == 'cau-chuyen' ? 'active' : '' }}">
                            <span>Câu chuyện</span>
                        </a>
                    </div>
                    <div class="col-4 menu-item d-flex justify-content-end">
                        @auth
                            <div class="nav-item dropdown">
                                <a class="dropdown-toggle" data-bs-toggle1="dropdown">
                                    Tài khoản
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="/tai-khoan">
                                            <span>{{ request()->user()->email }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/gio-hang">
                                            <span>Giỏ hàng</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/tai-khoan/gio-hang">
                                            <span>Đơn hàng chờ xử lý</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/tai-khoan/tra-cuu-nang-cao">
                                            <span>Tra cứu nâng cao</span>
                                        </a>
                                    </li>
                                    <li>
                                        <form method="POST" action="/logout">
                                            @csrf
                                            <button class="dropdown-item" type="submit">
                                                <span>Đăng xuất</span>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <a href="/login/" class="{{ request()->segment(1) == 'login' ? 'active' : '' }}">
                                <span>Đăng nhập</span>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- header mobile -->

<div class="header-mobile">
    <div class="d-block d-lg-none">
        <div class="layout-mb py-3 bg-white g-0">
            <div class="row g-0">
                <div class="col-4">
                    <div class="text-center">
                        <a href="/">
                            <img style="width: 100px;" class="mw-100" src="/img/header/logo.png" alt="Logo Thần Số Học">
                        </a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-center d-flex align-items-center mt-1 h-100" style="line-height: 17px; color: #398a6b; font-size: 14px;">
                        <span>KIẾN TẠO CUỘC ĐỜI HẠNH PHÚC TỰ NHỮNG CON SỐ</span>
                    </div>
                </div>
                <div class="col-2">
                    <div class="d-flex align-items-center h-100 justify-content-center">
                        <div id="menu-icon">
                            <div class="m_nav_ham button_closed" id="m_ham_1"></div>
                            <div class="m_nav_ham button_closed" id="m_ham_2"></div>
                            <div class="m_nav_ham button_closed" id="m_ham_3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-mobile hide-menu" id="menu-mobile">
            <div class="block-menu">
                <div class="logo">
                    <div class="text-center py-3">
                        <a href="/">
                            <img class="mw-100" src="/img/header/logo.png" alt="Logo Thần Số Học">
                        </a>
                    </div>
                </div>
                <div class="block">
                    <div class="menu-mb-item">
                        <a href="/">
                            <span>Trang chủ</span>
                        </a>
                    </div>
                    <div class="menu-mb-item">
                        <a class="{{ request()->segment(1) == 'gioi-thieu' ? 'active' : '' }}" data-bs-toggle="collapse" href="#collapseExample" aria-controls="collapseExample">
                            <span>Giới thiệu</span>
                        </a>
                        <div class="collapse mt-2" id="collapseExample">
                            <ul class="mb-0">
                                <li>
                                    <a class="dropdown-mobile" href="/gioi-thieu">
                                        <span>Giới thiệu</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-mobile" href="/gioi-thieu/than-so-hoc">
                                        <span>Thần Số Học Pythagoras</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-mobile" href="/gioi-thieu/than-so-hoc-la-gi">
                                        <span>Học viện cổ học Sala</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-mobile" href="/gioi-thieu/cuon-sach-cuoc-doi">
                                        <span>Cuốn sách cuộc đời</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="menu-mb-item">
                        <a class="{{ request()->segment(1) == 'san-pham' ? 'active' : '' }}" data-bs-toggle="collapse" href="#collapseExample2" aria-controls="collapseExample2">
                            <span>Sản phẩm</span>
                        </a>
                        <div class="collapse mt-2" id="collapseExample2">
                            <ul class="mb-0">
                                <li>
                                    <a class="dropdown-mobile" href="/san-pham">
                                        <span>Sản phẩm</span>
                                    </a>
                                </li>
                                @foreach ($products as $item)
                                    <li>
                                        <a class="dropdown-mobile" href="/san-pham/{{ $item->slug }}">
                                            <span>{{ Str::title($item->name) }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="menu-mb-item">
                        <a data-bs-toggle="collapse" href="#collapseExample3" aria-controls="collapseExample3 class="{{ request()->segment(1) == 'tin-tuc' ? 'active' : '' }}">
                            <span>Tin tức</span>
                        </a>
                        <div class="collapse mt-2" id="collapseExample3">
                            <ul class="mb-0">
                                @foreach ($categories as $item)
                                    <li>
                                        <a class="dropdown-mobile" href="/tin-tuc/{{ $item->slug }}">
                                            <span>{{ $item->name }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="menu-mb-item">
                        <a href="/cau-chuyen" class="{{ request()->segment(1) == 'cau-chuyen' ? 'active' : '' }}">
                            <span>Câu chuyện</span>
                        </a>
                    </div>
                    <div class="menu-mb-item">
                        @auth
                            <a href="/tai-khoan" class="{{ request()->segment(1) == 'tai-khoan' ? 'active' : '' }}">
                                <span>Tài khoản</span>
                            </a>
                        @else
                            <a href="/login" class="{{ request()->segment(1) == 'login' ? 'active' : '' }}">
                                <span>Đăng nhập</span>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="menu-done" id="menu-done"></div>
        </div>
    </div>
</div>

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
                    <div class="col-4 menu-item left text-center">
                        <a href="/gioi-thieu/" class="{{ request()->segment(1) == 'gioi-thieu' ? 'active' : '' }}">
                            <span>Giới thiệu</span>
                        </a>
                    </div>
                    <div class="col-4 menu-item left text-center">
                        <a href="/san-pham/" class="{{ request()->segment(1) == 'san-pham' ? 'active' : '' }}">
                            <span>Sản phẩm</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-4 text-center">
                <img class="logo-desktop" src="/img/header/logo.png" alt="Logo Thần Số Học">
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-4 menu-item right text-center">
                        <a href="/tin-tuc/" class="{{ request()->segment(1) == 'tin-tuc' ? 'active' : '' }}">
                            <span>Tin tức</span>
                        </a>
                    </div>
                    <div class="col-4 menu-item right text-end">
                        <a href="/cau-chuyen/" class="{{ request()->segment(1) == 'cau-chuyen' ? 'active' : '' }}">
                            <span>Câu chuyện</span>
                        </a>
                    </div>
                    <div class="col-4 menu-item right">
                        @auth
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">
                                    Tài khoản
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="/tai-khoan">
                                            <span>Thông tin</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/tai-khoan/gio-hang">
                                            <span>Giỏ hàng</span>
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
                <div class="col-9">
                    <div class="text-center">
                        <img src="/img/header/logo.png" alt="Logo Thần Số Học">
                    </div>
                </div>
                <div class="col-3">
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
                        <img src="/img/header/logo.png" alt="Logo Thần Số Học">
                    </div>
                </div>
                <div class="block">
                    <div class="menu-mb-item">
                        <a href="/">
                            <span>Trang chủ</span>
                        </a>
                    </div>
                    <div class="menu-mb-item">
                        <a href="/gioi-thieu/" class="{{ request()->segment(1) == 'gioi-thieu' ? 'active' : '' }}">
                            <span>Giới thiệu</span>
                        </a>
                    </div>
                    <div class="menu-mb-item">
                        <a href="/san-pham/" class="{{ request()->segment(1) == 'san-pham' ? 'active' : '' }}">
                            <span>Sản phẩm</span>
                        </a>
                    </div>
                    <div class="menu-mb-item">
                        <a href="/tin-tuc/" class="{{ request()->segment(1) == 'tin-tuc' ? 'active' : '' }}">
                            <span>Tin tức</span>
                        </a>
                    </div>
                    <div class="menu-mb-item">
                        <a href="/cau-chuyen/" class="{{ request()->segment(1) == 'cau-chuyen' ? 'active' : '' }}">
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

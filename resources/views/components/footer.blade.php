<footer>
    <div class="container container-service">
        <div class="footer text-white d-flex align-items-center">
            <div class="w-100">
                <div class="row g-0">
                    <div class="cus-col-2 col-md-6 col-xl-2">
                        <div class="footer-logo text-center px-4">
                            <img class="mw-100" src="/img/footer/logo.png" alt="Thần số học" />
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mt-4 d-flex d-xl-block justify-content-center justify-content-xl-start">
                        <div class="group mt-1 mt-md-0 mx-align-center">
                            <div class="footer-title"><h2>HỖ TRỢ KHÁCH HÀNG</h2></div>
                            <div class="footer-item">
                                <a href="tel://0942384382">
                                    <span>Hotline: 0942 384 382</span>
                                </a>
                            </div>
                            <div class="footer-item">
                                <span>Email: hotro@thansohocsala.com</span>
                            </div>
                            <div class="footer-lk">
                                <img src="/img/icon/instagram.png" alt="Than So Hoc Lien Ket">
                                <img src="/img/icon/tchich.png" alt="Than So Hoc Lien Ket">
                                <img src="/img/icon/youtube.png" alt="Than So Hoc Lien Ket">
                                <img src="/img/icon/vecto.png" alt="Than So Hoc Lien Ket">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mt-4 d-flex d-xl-block justify-content-center justify-content-xl-start">
                        <div class="group mt-4 mt-md-0 mx-align-center">
                            <div class="footer-title"><h2>VỀ THẦN SỐ HỌC SALA</h2></div>
                            <div class="footer-item">
                                <a href="/gioi-thieu/hoc-vien-co-hoc-sala" class="decoration-revert-hover">
                                    <span>Giới thiệu học viện cổ học</span>
                                </a>
                            </div>
                            <div class="footer-item">
                                <a href="/gioi-thieu/than-so-hoc" class="decoration-revert-hover">
                                    <span>Giới thiệu thần số học</span>
                                </a>
                            </div>
                            <div class="footer-item">
                                <a href="/hoi-dap/chinh-sach" class="decoration-revert-hover">
                                    <span>Chính sách</span>
                                </a>
                            </div>
                            <div class="footer-item">
                                <a href="/hoi-dap/dieu-khoan" class="decoration-revert-hover">
                                    <span>Điều khoản</span>
                                </a>
                            </div>
                            <div class="footer-item">
                                <a href="/hoi-dap/huong-dan-mua-hang" class="decoration-revert-hover">
                                    <span>Hướng dẫn mua hàng</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mt-4 d-flex d-xl-block justify-content-center justify-content-xl-start">
                        <div class="group mt-4 mt-md-0 mx-align-center">
                            <div class="footer-title"><h2>ĐĂNG KÝ NHẬN TIN</h2></div>
                            <form class="footer-item" action="/dang-ky" method="POST">
                                @csrf
                                <input class="form-contr-cus d-block" name="name" placeholder="Họ và tên:" type="text" required>
                                <input class="form-contr-cus d-block" name="email" placeholder="Email:" type="email" required>
                                <button type="submit" class="submit-cus">GỬI NGAY</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="hr mt-5"></div>
                    </div>
                    <div class="col-12">
                        <div class="text-center mt-5">
                            <h4 class="fw-light">MỘT SẢN PHẨM CỦA SALAGROUP</h4>
                            <div class="my-4 mb-3 mb-md-5">
                                <img class="mw-100" src="/img/footer/logosala.png" alt="Thansohocsala">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="coppyright">
        <div id="logo" class="owl-carousel owl-theme">
            <div class="item">
                <img class="mw-100" src="/img/footer/1.png" alt="than so hoc">
            </div>
            <div class="item">
                <img class="mw-100" src="/img/footer/2.png" alt="than so hoc">
            </div>
            <div class="item">
                <img class="mw-100" src="/img/footer/3.png" alt="than so hoc">
            </div>
            <div class="item">
                <img class="mw-100" src="/img/footer/4.png" alt="than so hoc">
            </div>
            <div class="item">
                <img class="mw-100" src="/img/footer/5.png" alt="than so hoc">
            </div>
            <div class="item">
                <img class="mw-100" src="/img/footer/6.png" alt="than so hoc">
            </div>
            <div class="item">
                <img class="mw-100" src="/img/footer/7.png" alt="than so hoc">
            </div>
            <div class="item">
                <img class="mw-100" src="/img/footer/8.png" alt="than so hoc">
            </div>
        </div>
        <div class="container container-service">
            <div class="content-c">
                <span>@ Sala  Group</span>
            </div>
        </div>
    </div>
</footer>

<div class="d-block d-md-none">
    <div class="cHbtvT">
        <a href="/" class="lnKnmv">
            <div class="cFoEFO">
                <div class="ekkfGn">
                    <picture class="webpimg-container">
                        <img src="https://frontend.tikicdn.com/_mobile-next/static/img/home/navigation/home.png" alt="Thansohocsala" class="cFoyeO" />
                    </picture>
                </div>
            </div>
            <span style="color: #{{ request()->segment(1) == '' ? '0d5cb6' : '242424' }};">Trang Chủ</span>
        </a>
        <a href="/gioi-thieu" class="lnKnmv">
            <div class="cFoEFO">
                <div class="ekkfGn">
                    <picture class="webpimg-container">
                        <img src="https://salt.tikicdn.com/ts/upload/c3/9b/0e/1867ff54d9f4d07f3f7fe1a7f19a79ee.png" alt="Thansohocsala" class="cFoyeO" />
                    </picture>
                </div>
            </div>
            <span style="color: #{{ request()->segment(1) == 'gioi-thieu' ? '0d5cb6' : '242424' }};">Giới Thiệu</span>
        </a>
        <a href="/tra-cuu" class="lnKnmv">
            <div class="cFoEFO">
                <div class="ekkfGn">
                    <picture class="webpimg-container">
                        <svg class="cFoyeO" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 24 24" width="20" fill="#5a5a5a">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path
                                d="M17.81 4.47c-.08 0-.16-.02-.23-.06C15.66 3.42 14 3 12.01 3c-1.98 0-3.86.47-5.57 1.41-.24.13-.54.04-.68-.2-.13-.24-.04-.55.2-.68C7.82 2.52 9.86 2 12.01 2c2.13 0 3.99.47 6.03 1.52.25.13.34.43.21.67-.09.18-.26.28-.44.28zM3.5 9.72c-.1 0-.2-.03-.29-.09-.23-.16-.28-.47-.12-.7.99-1.4 2.25-2.5 3.75-3.27C9.98 4.04 14 4.03 17.15 5.65c1.5.77 2.76 1.86 3.75 3.25.16.22.11.54-.12.7-.23.16-.54.11-.7-.12-.9-1.26-2.04-2.25-3.39-2.94-2.87-1.47-6.54-1.47-9.4.01-1.36.7-2.5 1.7-3.4 2.96-.08.14-.23.21-.39.21zm6.25 12.07c-.13 0-.26-.05-.35-.15-.87-.87-1.34-1.43-2.01-2.64-.69-1.23-1.05-2.73-1.05-4.34 0-2.97 2.54-5.39 5.66-5.39s5.66 2.42 5.66 5.39c0 .28-.22.5-.5.5s-.5-.22-.5-.5c0-2.42-2.09-4.39-4.66-4.39s-4.66 1.97-4.66 4.39c0 1.44.32 2.77.93 3.85.64 1.15 1.08 1.64 1.85 2.42.19.2.19.51 0 .71-.11.1-.24.15-.37.15zm7.17-1.85c-1.19 0-2.24-.3-3.1-.89-1.49-1.01-2.38-2.65-2.38-4.39 0-.28.22-.5.5-.5s.5.22.5.5c0 1.41.72 2.74 1.94 3.56.71.48 1.54.71 2.54.71.24 0 .64-.03 1.04-.1.27-.05.53.13.58.41.05.27-.13.53-.41.58-.57.11-1.07.12-1.21.12zM14.91 22c-.04 0-.09-.01-.13-.02-1.59-.44-2.63-1.03-3.72-2.1-1.4-1.39-2.17-3.24-2.17-5.22 0-1.62 1.38-2.94 3.08-2.94s3.08 1.32 3.08 2.94c0 1.07.93 1.94 2.08 1.94s2.08-.87 2.08-1.94c0-3.77-3.25-6.83-7.25-6.83-2.84 0-5.44 1.58-6.61 4.03-.39.81-.59 1.76-.59 2.8 0 .78.07 2.01.67 3.61.1.26-.03.55-.29.64-.26.1-.55-.04-.64-.29-.49-1.31-.73-2.61-.73-3.96 0-1.2.23-2.29.68-3.24 1.33-2.79 4.28-4.6 7.51-4.6 4.55 0 8.25 3.51 8.25 7.83 0 1.62-1.38 2.94-3.08 2.94s-3.08-1.32-3.08-2.94c0-1.07-.93-1.94-2.08-1.94s-2.08.87-2.08 1.94c0 1.71.66 3.31 1.87 4.51.95.94 1.86 1.46 3.27 1.85.27.07.42.35.35.61-.05.23-.26.38-.47.38z"
                            />
                        </svg>
                    </picture>
                </div>
            </div>
            <span style="color: #{{ request()->segment(1) == 'tra-cuu' ? '0d5cb6' : '242424' }};">Tra Cứu</span>
        </a>
        <a href="/gio-hang" class="lnKnmv">
            <div class="cFoEFO">
                <div class="ekkfGn">
                    <picture class="webpimg-container">
                        <svg class="cFoyeO" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 24 24">
                            <defs>
                                <path id="yqtrzm486a" d="M6.5 18c.828 0 1.5.672 1.5 1.5S7.328 21 6.5 21 5 20.328 5 19.5 5.672 18 6.5 18zm12 0c.828 0 1.5.672 1.5 1.5s-.672 1.5-1.5 1.5-1.5-.672-1.5-1.5.672-1.5 1.5-1.5zM3.857.2c.401 0 .74.297.793.694l.542 4.068H21c.505 0 .883.462.784.957l-1.904 9.524c-.075.374-.403.643-.785.643H5.762c-.401 0-.74-.297-.793-.695L3.157 1.8H1C.558 1.8.2 1.442.2 1 .2.558.558.2 1 .2zm16.167 6.362H5.406l1.056 7.924H18.44l1.585-7.924z"/>
                            </defs>
                            <g fill="none" fill-rule="evenodd">
                                <g transform="translate(1 1)">
                                    <use fill="#787878" xlink:href="#yqtrzm486a"/>
                                </g>
                            </g>
                        </svg>
                    </picture>
                </div>
            </div>
            <span style="color: #{{ request()->segment(1) == 'gio-hang' ? '0d5cb6' : '242424' }};">Giỏ Hàng</span>
        </a>
        <a href="/tai-khoan" class="lnKnmv">
            <div class="cFoEFO">
                <div class="ekkfGn">
                    <picture class="webpimg-container">
                        <img src="https://frontend.tikicdn.com/_mobile-next/static/img/home/navigation/account.png" alt="Thansohocsala" class="cFoyeO" />
                    </picture>
                </div>
            </div>
            <span style="color: #{{ request()->segment(1) == 'tai-khoan' ? '0d5cb6' : '242424' }};">{{ request()->user() ? "Cá Nhân" : "Đăng Nhập" }}</span>
        </a>
    </div>
</div>

@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="/css/tra-cuu.css">
@endpush

@section('content')

<div class="tracuu">
    <div class="main-tracuu">
        <div class="container container-chuyengia">
            <div class="row g-0 align-items-end">
                <div class="col-xl-5">
                    <img class="mw-100" src="/img/tra-cuu/1.png" alt="than so hoc">
                </div>
                <div class="col-xl-7">
                    <form method="POST" action="/tra-cuu/">
                        @csrf
                        <div class="block-main text-white">
                            <div class="mw-fix">
                                <div class="title"><h1 class="text-center">TRA CỨU THẦN SỐ HỌC</h1></div>
                                <!-- <div class="desc"><span>Đường đời. điểm mạnh yêu, vận mệnh, sự nghệp, năm thành công....</span></div> -->
                            </div>
                            <div class="row g-0 gx-5 gx-xl-0">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-input">
                                            <label for="name">Nhập họ tên khai sinh</label>
                                            <input id="name" name="name" type="text" required >
                                        </div>
                                        <div class="form-input">
                                            <label for="birthday">Ngày sinh</label>
                                            <input name="birthday" id="birthday" type="date" required >
                                        </div>
                                        <div class="form-input">
                                            <label for="sdt">Số điện thoại</label>
                                            <input id="sdt" name="sdt" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-radio text-white">
                                            <div>
                                                <label>Giới tính</label>
                                            </div>
                                            <div class="block">
                                                <label class="radio-group">
                                                    <input type="radio" name="radio" checked id="radio-1" />
                                                    <span class="checkmark"></span>
                                                    <label class="label" htmlFor="radio-1">Nam</label>
                                                </label>
                                                <label class="radio-group">
                                                    <input type="radio" name="radio" id="radio-2" />
                                                    <span class="checkmark"></span>
                                                    <label class="label" htmlFor="radio-2">Nữ</label>
                                                </label>
                                                <label class="radio-group">
                                                    <input type="radio" name="radio" id="radio-3" />
                                                    <span class="checkmark"></span>
                                                    <label class="label" htmlFor="radio-3">khác</label>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-input">
                                            <label for="diachi">Địa chỉ</label>
                                            <input name="diachi" id="diachi" type="text">
                                        </div>
                                        <div class="form-input">
                                            <label class="w-100" for="email">Email</label>
                                            <input id="email" name="email" type="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="submit text-center">
                                    <button class="btn-submit">Tra cứu</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="chuthich">
    <div class="container container-chuyengia">
        <div class="row g-0">
            <div class="col-xl-5">

            </div>
            <div class="col-xl-7 text-white">
                <div class="main--chuthich">
                    <div class="header--chuthich">
                        <h4 class="text-uppercase fw-light">Chú thích</h4>
                    </div>
                    <ul class="list-group fw-lighter">
                        <li>
                            <div class="item d-flex">
                                <div>
                                    <img src="/img/tra-cuu/icon.png" alt="">
                                </div>
                                <div>
                                    <div class="content"><span>Nếu ngày sinh trên giấy tờ (chứng minh thư, bằng lái, khai sinh...) và ngày sinh dương lịch thật của bạn khác nhau thì</span></div>
                                    <div class="content"><span>cuộc đời bạn sẽ có xáo trộn của cả 2 ngày sinh này. Bạn nên tra cứu cả hai để biết thêm, tuy nhiên kết quả sẽ thiên</span></div>
                                    <div class="content"><span>về ngày sinh dương lịch.</span></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item d-flex">
                                <div>
                                    <img src="/img/tra-cuu/icon.png" alt="">
                                </div>
                                <div>
                                    <div class="content"><span>Số chủ đạo tuy rất quan trọng nhưng không thể hiện hết toàn bộ thông tin thần số của bạn.</span></div>
                                    <div class="content"><span>Để xem kết quả tra cứu chính xác nhất, hãy kết hợp tất cả các chỉ số mà chúng tôi tính tán cho bạn.</span></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item d-flex">
                                <div>
                                    <img src="/img/tra-cuu/icon.png" alt="">
                                </div>
                                <div>
                                    <div class="content"><span>Thông tin của quý khách được Thần Số Học Sala cam kết giữ bảo mật.</span></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

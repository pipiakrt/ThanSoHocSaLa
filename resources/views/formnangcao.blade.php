@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="/plugins/dtsel-master/dtsel.css">
@endpush

@push('scripts')
<script src="/plugins/dtsel-master/dtsel.js"></script>
<script>
    $('#birthday').datepicker({
        format: 'dd-mm-yyyy'
    });
</script>
@endpush

@section('content')

<x-slogan />

<nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="active">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
        </ol>
    </div>
</nav>

<div class="container">

    @if (\Session::has('success'))
        <div class="alert alert-success mt-4">
            <ul class="mb-0">
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif

    @if (\Session::has('error'))
        <div class="alert alert-danger mt-4">
            <ul class="mb-0">
                <li>{!! \Session::get('error') !!}</li>
            </ul>
        </div>
    @endif

    <div class="row my-5">
        <div class="col-md-3 mb-4">
            <x-account-menu />
        </div>
        <div class="col-md-9 order-md-1">
            <h4 class="mb-3">Thông tin</h4>
            <p class="fw-light mb-1">- Thần số học Pitago (Nhân số học) là một môn khoa học cho biết chính xác tính cách và vận mệnh của 1 con người! Các chỉ số được tính ra từ họ và tên, ngày tháng năm sinh cho biết các nhóm tính cách đặc trưng và tiềm năng của con người đó.</p>
            <p class="fw-light mb-1">- Tại Việt Nam, xem thần số học mới chỉ được biết đến qua con số chủ đạo (chỉ số đường đời). Nhưng thực tế thần số học là tổng hợp của rất nhiều chỉ số khác nhau (hơn 50) và trang web này sẽ tra cứu và giải đáp giúp bạn!</p>
            <p class="fw-light mb-1">- Tính toán hàng chục nghìn phép tính thần số phức tạp cực nhanh chỉ sau 1 giây để cho ra các tổ hợp chỉ số mà không hề sai sót như tính tay.</p>
            <p class="fw-light">- Luận giải kết quả tra cứu được cá nhân hóa dựa vào nghiên cứu chuyên sâu của các chuyên gia Thần số học.</p>
            <p class="fw-light">Đối với người mới: <b>Đọc <a href="/" class="link-primary decoration-revert">bài viết này</a> để hiểu hơn về thần số học</b></p>
            <form class="needs-validation" action="/tai-khoan/tra-cuu-nang-cao" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Họ tên</label>
                        <input type="text" name="name" class="form-control" id="name" required />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="birthday">Ngày sinh</label>
                        <input type="text" id="birthday" name="birthday" class="form-control" required />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone">Điện thoại</label>
                        <input type="text" name="phone" class="form-control" id="phone" required />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required />
                    </div>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Tra Cứu</button>
                </div>

            </form>
        </div>
    </div>

</div>


@endsection

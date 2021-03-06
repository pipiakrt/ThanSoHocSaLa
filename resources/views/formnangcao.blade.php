@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="/plugins/dtsel-master/dtsel.css">
    <link rel="stylesheet" href="/css/loading.css">
@endpush

@push('scripts')
    <script src="/plugins/dtsel-master/dtsel.js"></script>
    <script>
        $('#birthday').datepicker({
            format: 'dd-mm-yyyy'
        });
        function loadding () {
            var counter = 0;
            var c = 0;
            var i = setInterval(function() {
                $(".loader--counter").html(c + "%");
                counter++;
                c++;
                if (counter == 101) {
                    clearInterval(i);
                }
            }, 150);
        };
        $("#form-data").submit(function(event) {
            event.preventDefault();
            let mobileDevice = false;
            if (screen.width < 768) {
                mobileDevice = true;
            }
            loadding();
            $('#exampleModal').modal('show');
            $.ajax({
                url : "/tai-khoan/tra-cuu-nang-cao",
                type : "post",
                data : {
                    name : $('#name').val(),
                    email : $('#email').val(),
                    phone : $('#phone').val(),
                    birthday : $('#birthday').val(),
                },
                success : function (data) {
                    if (data == "error") {
                        $("#alert").show();
                        setTimeout(() => {
                            $('#exampleModal').modal('hide');
                        }, 350);
                        $('#exampleModal').modal('hide');
                    }
                    // else if (mobileDevice) {
                    //     window.location.href = `/tai-khoan/lich-su-tra-cuu/${data.code}`;
                    // }
                    else {
                        window.location.href = `/tai-khoan/export_v2/${data.code}/${data.name} (${data.birthdate})`;
                    }
                }
            });
        });
    </script>
@endpush

@section('content')

    <x-slogan />

    <!-- Modal -->
    <div style="background: white;" class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class='container-loader'>
                <div class='loader'>
                    <div class='loader--dot'></div>
                    <div class='loader--dot'></div>
                    <div class='loader--dot'></div>
                    <div class='loader--dot'></div>
                    <div class='loader--dot'></div>
                    <div class='loader--dot'></div>
                    <div class='loader--text'></div>
                    <div class="loader--counter"></div>
                </div>
            </div>
        </div>
    </div>

    <nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="active">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
            </ol>
        </div>
    </nav>

    <div class="container">

        <div id="alert" style="display: none" class="alert alert-danger mt-4">
            <ul class="mb-0">
                <li>Số lượt tra cứu nâng cao của bạn đã hết, nâng cấp hoạc mua thêm gói để được tiếp tục tra cứu!</li>
            </ul>
        </div>

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
                <form id="form-data" class="needs-validation" action="/tai-khoan/tra-cuu-nang-cao" method="POST">
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

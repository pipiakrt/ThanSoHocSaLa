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
                <li class="breadcrumb-item"><a href="/" class="active">Trang ch???</a></li>
                <li class="breadcrumb-item"><a href="#">T??i kho???n</a></li>
            </ol>
        </div>
    </nav>

    <div class="container">

        <div id="alert" style="display: none" class="alert alert-danger mt-4">
            <ul class="mb-0">
                <li>S??? l?????t tra c???u n??ng cao c???a b???n ???? h???t, n??ng c???p ho???c mua th??m g??i ????? ???????c ti???p t???c tra c???u!</li>
            </ul>
        </div>

        <div class="row my-5">
            <div class="col-md-3 mb-4">
                <x-account-menu />
            </div>
            <div class="col-md-9 order-md-1">
                <h4 class="mb-3">Th??ng tin</h4>
                <p class="fw-light mb-1">- Th????n s???? ho??c Pitago (Nh??n s??? h???c) la?? m????t m??n khoa ho??c cho bi????t chi??nh xa??c ti??nh ca??ch va?? v????n m????nh cu??a 1 con ng??????i! Ca??c chi?? s???? ????????c ti??nh ra t???? ho?? va?? t??n, nga??y tha??ng n??m sinh cho bi????t ca??c nho??m t??nh c??ch ??????c tr??ng v?? ti???m n??ng cu??a con ng??????i ??o??.</p>
                <p class="fw-light mb-1">- Ta??i Vi????t Nam, xem th????n s???? ho??c m????i chi?? ????????c bi????t ??????n qua con s???? chu?? ??a??o (chi?? s???? ????????ng ??????i). Nh??ng th????c t???? th????n s???? ho??c la?? t????ng h????p cu??a r????t nhi????u chi?? s???? kha??c nhau (h??n 50) va?? trang web na??y se?? tra c????u va?? gia??i ??a??p giu??p ba??n!</p>
                <p class="fw-light mb-1">- T??nh to??n h??ng ch???c ngh??n ph??p t??nh th???n s??? ph???c t???p c???c nhanh ch??? sau 1 gi??y ????? cho ra c??c t??? h???p ch??? s??? m?? kh??ng h??? sai s??t nh?? t??nh tay.</p>
                <p class="fw-light">- Lu???n gi???i k???t qu??? tra c???u ???????c c?? nh??n h??a d???a v??o nghi??n c???u chuy??n s??u c???a c??c chuy??n gia Th???n s??? h???c.</p>
                <p class="fw-light">?????i v???i ng?????i m???i: <b>?????c <a href="/" class="link-primary decoration-revert">b??i vi???t n??y</a> ????? hi???u h??n v??? th???n s??? h???c</b></p>
                <form id="form-data" class="needs-validation" action="/tai-khoan/tra-cuu-nang-cao" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">H??? t??n</label>
                            <input type="text" name="name" class="form-control" id="name" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="birthday">Ng??y sinh</label>
                            <input type="text" id="birthday" name="birthday" class="form-control" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone">??i???n tho???i</label>
                            <input type="text" name="phone" class="form-control" id="phone" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required />
                        </div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Tra C???u</button>
                    </div>

                </form>
            </div>
        </div>

    </div>


@endsection

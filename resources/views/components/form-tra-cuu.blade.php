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

<div class="form-tracuu" id="form-tracuu">
    <div class="container container-header text-lights px-0">
        <div class="_mb-8">
            <iframe class="w-100 m-0 youtube-responsive" height="750" src="https://www.youtube.com/embed/rwEfiiqJJK8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <!--  -->
        <form class="main-tracuu d-flex align-items-center justify-content-center" method="POST" action="/tra-cuu">
            @csrf
            <div class="w-100">
                <div class="row g-0">
                    <div class="col-lg-12 col-xl-4 ct-col-4">
                        <h1 class="text-white mb-0 mb-md-4">ĐĂNG KÍ TRA CỨU THẦN SỐ HỌC</h1>
                    </div>
                    <div class="col-lg-4 col-xl-3 ct-col-3">
                        <div class="mb-2">
                            <input class="custom-form-input mb-4" name="name" type="text" placeholder="Họ và tên:" required>
                        </div>
                        <div class="mb-2 mb-lg-0">
                            <input class="custom-form-input mb-4 mb-lg-0" name="phone" type="number" placeholder="Số điện thoại:" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3 ct-col-3">
                        <div class="mb-2">
                            <input class="custom-form-input mb-4" name="email" type="email" placeholder="Email:" required>
                        </div>
                        <div class="mb-2 mb-lg-0">
                            <input id="birthday" placeholder="Ngày/Tháng/Năm" class="custom-form-input mb-4 mb-lg-0" name="birthday" type="text" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-2 ct-col-2">
                        <div class="d-flex align-items-center h-100 w-100">
                            <button type="submit" class="btn-tracuu w-100">GIẢI MÃ NGAY</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

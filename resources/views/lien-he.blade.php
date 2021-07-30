@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="/css/lien-he.css">
@endpush

@section('content')

<div class="lienhe">
    <div class="main-lienhe">
        <div class="container container-chuyengia">
            <div class="row g-0 align-items-center">
                <div class="col-xl-5">
                    <iframe class="mw-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.0510767042574!2d105.80214781562714!3d20.99058959445454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad7aa568a52b%3A0xa82aeb311c9d72e3!2zWMaw4bufbmcgR-G7kW0gQsOhdCBUcsOgbmcgSMOgIE7hu5lpIC0gU-G7kSA5IE5ndXnhu4VuIFhp4buDbg!5e0!3m2!1svi!2s!4v1627658643260!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="col-xl-7">
                    <form action="/ket-qua-tra-cuu" method="GET">
                        <div class="block-main text-white">
                            <div class="mw-fix">
                                <div class="title"><h1 class="text-center">GỬI PHẢN HỒI TỚI CHÚNG TÔI</h1></div>
                                <!-- <div class="desc"><span>Đường đời. điểm mạnh yêu, vận mệnh, sự nghệp, năm thành công....</span></div> -->
                            </div>
                            <div class="row g-0 gx-5 gx-xl-0">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-input">
                                            <label for="name">Họ tên</label>
                                            <input id="name" name="name" type="text" required >
                                        </div>
                                        <div class="form-input">
                                            <label for="sdt">Điện thoại</label>
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
                                            <label class="w-100" for="email">Email</label>
                                            <input id="email" name="email" type="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-input">
                                        <label class="w-100" for="email">Nội dung</label>
                                        <textarea name="content" cols="10" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="submit">
                                    <button class="btn-submit">Gửi phản hồi</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    <x-khach-hang-phan-hoi />

@endsection

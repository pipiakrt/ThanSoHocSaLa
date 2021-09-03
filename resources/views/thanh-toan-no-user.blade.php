@extends('layouts.app')

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    @verbatim
        <script>
            new Vue({
                el: '#components',
                data () {
                    return {
                        province_id: '',
                        district_id: '',
                        ward_id: '',
                        province: [],
                        district: [],
                        ward: [],
                        payment: "Ship COD"
                    }
                },
                mounted() {
                    this.getProvinces()
                },
                methods: {
                    getProvinces () {
                        axios.get('/address/province').then(response => {
                            this.province = response.data
                        })
                    },
                    getDistrict () {
                        axios.get('/address/district/' + this.province_id).then(response => {
                            this.district = response.data
                        })
                    },
                    getWard () {
                        axios.get('/address/ward/' + this.district_id).then(response => {
                            this.ward = response.data
                        })
                    }
                },
            })
        </script>
    @endverbatim
@endpush

@section('content')

<x-slogan />

<nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="active">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Tiến hành đặt hàng</a></li>
        </ol>
    </div>
</nav>

<div class="container">

    @if ($errors->any())
        <div class="alert alert-danger mb-0 mt-5">
            <ul class="mb-0" style="list-style: none;">
                @foreach ($errors->all() as $error)
                    <li style="font-size: 23px;">{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div id="components">
        <div class="row my-5 justify-content-center py-4" style="background: #f2f2f2;">
            <div class="col-md-9 order-md-1">
                <h4 class="mb-3">Thông tin thanh toán</h4>
                <form class="needs-validation" action="/thanh-toan" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="name">Họ Tên</label>
                            <div class="input-group">
                                <input type="text" name="name" class="form-control" id="name" />
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="username">Địa Chỉ Email</label>
                            <div class="input-group">
                                <input type="text" name="email" class="form-control" id="username" />
                            </div>
                        </div>
                        <div class="col-md-5 mb-3">
                            <div class="row g-0">
                                <div class="col-12">
                                    <label for="phone">Hình thức thanh toán</label>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-check mt-2">
                                        <input v-model="payment" class="form-check-input" type="radio" value="Ship COD" name="payment" id="flexRadioDefault2" checked >
                                        <label class="form-check-label" for="flexRadioDefault2">Ship COD</label>
                                    </div>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <div class="form-check mt-2">
                                        <input v-model="payment" class="form-check-input" type="radio" value="Chuyển khoản ngân hàng" name="payment" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">Chuyển khoản ngân hàng</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="birthdate">Ngày sinh</label>
                            <input type="text" name="birthdate" class="form-control" id="birthdate" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone">Điện thoại</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="phone" id="phone" required />
                            </div>
                        </div>
                    </div>
                    <template v-if="payment == 'Ship COD'">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <select @change="getDistrict" v-model="province_id" name="province" class="form-select" aria-label="Default select example" required>
                                    <option value="" selected>Tỉnh/Thành Phố</option>
                                    <template v-for="item in province">
                                        <option :key="item.id" :value="item.id" v-text="item.name"></option>
                                    </template>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select @change="getWard" v-model="district_id" name="district" class="form-select" aria-label="Default select example" required>
                                    <option value="" selected>Quận/Huyện</option>
                                    <template v-for="item in district">
                                        <option :key="item.id" :value="item.id" v-text="item.name"></option>
                                    </template>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select v-model="ward_id" class="form-select" name="ward" aria-label="Default select example" required>
                                    <option value="" selected>Phường/Xã</option>
                                    <template v-for="item in ward">
                                        <option :key="item.id" :value="item.id" v-text="item.name"></option>
                                    </template>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address">Địa chỉ cụ thể</label>
                            <textarea class="form-control" id="address" name="address" rows="5" required></textarea>
                        </div>
                    </template>

                    <div class="mb-3">
                        <label for="note">Ghi chú</label>
                        <textarea class="form-control" id="note" name="note" rows="5"></textarea>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Đặt hàng</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>


@endsection

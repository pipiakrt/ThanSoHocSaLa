<template>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <Breadcrumb :data="subHeader" />
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class='col-md-12'>
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin chung</h3>
                        </div>
                        <form ref="FormPost">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Mã Đơn Hàng</label>
                                    <div class="col-10">
                                        <input :value="code" class="form-control" type="text" disabled />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Khách Hàng</label>
                                    <div class="col-10">
                                        <input :value="name" class="form-control" type="text" disabled />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Hình Thức Thanh Toán</label>
                                    <div class="col-10">
                                        <input :value="payment" class="form-control" type="text" disabled />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Điện Thoại</label>
                                    <div class="col-10">
                                        <input :value="phone" class="form-control" type="text" disabled />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Email</label>
                                    <div class="col-10">
                                        <input :value="email" class="form-control" type="text" disabled />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Giá</label>
                                    <div class="col-10">
                                        <input :value="price" class="form-control" type="text" disabled />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-2 col-form-label">Địa Chỉ</label>
                                    <div class="col-10">
                                        <textarea v-model="address" class="form-control" placeholder="Địa Chỉ" rows="5" id="address" disabled></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="note" class="col-2 col-form-label">Ghi chú</label>
                                    <div class="col-10">
                                        <textarea v-model="note" class="form-control" placeholder="Ghi chú" rows="5" id="note" disabled></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Lượt tra cứu gốc</label>
                                    <div class="col-10">
                                        <input v-model="licenses" class="form-control" type="number" :disabled="status != 1" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Lượt tra cứu cộng từ gói</label>
                                    <div class="col-10">
                                        <input v-model="licenses_goi" class="form-control" type="number" :disabled="status != 1" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Trạng Thái Đơn Hàng</label>
                                    <div class="col-10">
                                        <select v-model="status" class="form-control" style="height: 35px">
                                            <option value="0">Chờ Kích Hoạt</option>
                                            <option value="1">Kích Hoạt</option>
                                            <option value="2">Hết Hạn</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" v-show="status == 1">
                                    <label for="description" class="col-2 col-form-label">Thời Hạn</label>
                                    <div class="col-10">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="input-group date" id="kt_datetimepicker_1" data-target-input="nearest">
                                                    <input :value="bat_dau" type="text" id="datetimepicker_1" class="form-control datetimepicker-input" placeholder="Thời gian bắt đầu" data-target="#kt_datetimepicker_1" />
                                                    <div class="input-group-append" data-target="#kt_datetimepicker_1" data-toggle="datetimepicker">
                                                        <span class="input-group-text">
                                                            <i class="ki ki-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group date" id="kt_datetimepicker_2" data-target-input="nearest">
                                                    <input :value="ket_thuc" type="text" id="datetimepicker_2" class="form-control datetimepicker-input" placeholder="Thời gian kết thúc" data-target="#kt_datetimepicker_2" />
                                                    <div class="input-group-append" data-target="#kt_datetimepicker_2" data-toggle="datetimepicker">
                                                        <span class="input-group-text">
                                                            <i class="ki ki-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card-footer text-center">
                            <router-link to="/sala-backend/don-hang/danh-sach" type="reset" class="btn btn-light-primary mr-1 font-weight-bolder"><i class="icon-sm ki ki-long-arrow-back"></i> Quay Lại</router-link>
                            <button type="reset" @click="submit(1)" class="btn btn-primary mr-1"><i class="icon-sm ki ki-bold-check-1   "></i> Lưu đơn hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Breadcrumb from '../../components/breadcrumb/index'

export default {
    components: {
        Breadcrumb
    },
    data() {
        return {
            subHeader: {
                links: [{
                        name: 'đơn hàng',
                        url: '/sala-backend/don-hang/danh-sach',
                    },
                ],
                action: {
                    url: '/sala-backend/don-hang/danh-sach',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Danh Sách',
                }
            },
            user_id: '',
            id: '',
            code: '',
            name: '',
            phone: '',
            email: '',
            payment: '',
            price: '',
            status: '',
            bat_dau: '',
            ket_thuc: '',
            licenses: '',
            licenses_goc: '',
            licenses_goi: 0,
            address: '',
            note: '',
        }
    },
    watch: {
        licenses_goi() {
            this.licenses = Number(this.licenses_goi) + Number(this.licenses_goc)
        }
    },
    async created() {
        await axios('/api/orders/' + this.$route.params.id).then(res => {
            this.user_id = res.data.data.user.id
            this.id = res.data.data.id
            this.code = res.data.data.code
            this.name = res.data.data.name
            this.phone = res.data.data.phone
            this.email = res.data.data.email
            this.price = res.data.data.price
            this.status = res.data.data.status
            this.bat_dau = res.data.data.bat_dau
            this.payment = res.data.data.payment
            this.ket_thuc = res.data.data.ket_thuc
            this.licenses_goc = this.licenses = res.data.data.licenses
            this.address = res.data.data.address
            this.note = res.data.data.note
            KTUtil.ready(function () {
                $('#kt_datetimepicker_1').datetimepicker();
                $('#kt_datetimepicker_2').datetimepicker();
            });
        })
    },
    methods: {
        async submit() {
            let params = {
                bat_dau: $('#datetimepicker_1').val(),
                ket_thuc: $('#datetimepicker_2').val(),
                status: this.status,
            }
            KTApp.blockPage({
                overlayColor: "#000000",
                state: "primary",
                message: "Đợi Xíu...",
            })
            axios.put('/api/orders/' + this.id, params).then((res) => {
                KTApp.unblockPage();
                toastr.success("Tạo đơn hàng thành công!")
                this.$router.push('/sala-backend/don-hang/cho-xac-nhan');
            })
            axios.put(`/api/users/${this.user_id}?number=${this.licenses}`)
        }
    }
}
</script>

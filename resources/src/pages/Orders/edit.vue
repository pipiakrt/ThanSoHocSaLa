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
                                <div v-if="status_origin == 3" class="form-group row">
                                    <label for="lydohuy" class="col-2 col-form-label">Ly do hủy</label>
                                    <div class="col-10">
                                        <textarea v-model="lydohuy" class="form-control" placeholder="Ly do hủy" rows="5" id="lydohuy" disabled></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Trạng Thái Đơn Hàng</label>
                                    <div class="col-10">
                                        <select v-model="status" class="form-control" style="height: 35px" disabled>
                                            <option v-if="status == 0" value="0">Chờ Kích Hoạt</option>
                                            <option value="1">Kích Hoạt</option>
                                            <option value="2">Hủy Đơn</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card-footer text-center">
                            <router-link to="/sala-backend/don-hang/danh-sach" type="reset" class="btn btn-light-primary mr-1 font-weight-bolder"><i class="icon-sm ki ki-long-arrow-back"></i> Quay Lại</router-link>
                            <!-- <button type="reset" @click="submit(1)" class="btn btn-primary mr-1"><i class="icon-sm ki ki-bold-check-1   "></i> Lưu đơn hàng</button> -->
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
            lydohuy: '',
            name: '',
            phone: '',
            email: '',
            payment: '',
            price: '',
            status_origin: '',
            status: '',
            licenses: '',
            number: '',
            address: '',
            note: '',
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
            this.status_origin = this.status = res.data.data.status
            this.payment = res.data.data.payment
            this.licenses = res.data.data.licenses
            this.number = res.data.data.number
            this.address = res.data.data.address
            this.note = res.data.data.note
            this.lydohuy = res.data.data.lydohuy
        })
    },
    methods: {
        async submit() {
            let params = {
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
            if (this.status_origin == 0) {
                axios.put(`/api/users/${this.user_id}?number=${this.licenses + this.number}`)
            }
        }
    }
}
</script>

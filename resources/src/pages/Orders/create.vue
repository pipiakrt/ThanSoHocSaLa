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
                                    <label for="name" class="col-2 col-form-label">Tên Khách Hàng</label>
                                    <div class="col-10">
                                        <input :value="name" class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Email</label>
                                    <div class="col-10">
                                        <input :value="email" class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Hình Thức Thanh Toán</label>
                                    <div class="col-10">
                                        <input :value="payment" class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Điện Thoại</label>
                                    <div class="col-10">
                                        <input :value="phone" class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-2 col-form-label">Địa Chỉ</label>
                                    <div class="col-10">
                                        <textarea v-model="address" class="form-control" placeholder="Địa Chỉ" rows="5" id="address"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="note" class="col-2 col-form-label">Ghi chú</label>
                                    <div class="col-10">
                                        <textarea v-model="note" class="form-control" placeholder="Ghi chú" rows="5" id="note"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card-footer text-center">
                            <router-link to="/sala-backend/don-hang/danh-sach" type="reset" class="btn btn-light-primary mr-1 font-weight-bolder"><i class="icon-sm ki ki-long-arrow-back"></i> Quay Lại</router-link>
                            <button type="reset" @click="submit(1)" class="btn btn-primary mr-1"><i class="icon-sm ki ki-bold-check-1   "></i> Lên đơn hàng</button>
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
            status_origin: '',
            status: '',
            licenses: '',
            number: '',
            address: '',
            note: '',
        }
    },
    async created() {
        await axios('/api/products').then(res => {

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

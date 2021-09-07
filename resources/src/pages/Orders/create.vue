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
                        <ValidationObserver ref="errors">
                            <form ref="FormPost">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="name" class="col-2 col-form-label">Tên Khách Hàng</label>
                                        <div class="col-10">
                                            <validation-provider rules="required" v-slot="{ errors }">
                                                <input v-model="name" class="form-control" type="text" />
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-2 col-form-label">Email</label>
                                        <div class="col-10">
                                            <validation-provider rules="required" v-slot="{ errors }">
                                                <input v-model="email" class="form-control" type="email" />
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-2 col-form-label">Điện Thoại</label>
                                        <div class="col-10">
                                            <validation-provider rules="required" v-slot="{ errors }">
                                                <input v-model="phone" class="form-control" type="number" />
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-2 col-form-label">Gói Sản Phẩm</label>
                                        <div class="col-10">
                                            <validation-provider rules="required" v-slot="{ errors }">
                                                <select v-model="product_id" class="form-control" style="height: 35px">
                                                    <option value="">Gói sản phẩm</option>
                                                    <template v-for="product in products">
                                                        <option v-if="product.status" :key="product.id" :value="product.id" v-text="product.name"></option>
                                                    </template>
                                                </select>
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-2 col-form-label">Hình Thức Thanh Toán</label>
                                        <div class="col-10">
                                            <validation-provider rules="required" v-slot="{ errors }">
                                                <select v-model="payment" class="form-control" style="height: 35px">
                                                    <option value="Chuyển khoản ngân hàng">Chuyển khoản ngân hàng</option>
                                                    <option value="Ship COD">Ship COD</option>
                                                </select>
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-2 col-form-label">Data Thuộc MKT</label>
                                        <div class="col-10">
                                            <select v-model="mkt_id" class="form-control" style="height: 35px">
                                                <option value="">NV MKT</option>
                                                <option v-for="user in users" :key="user.id" :value="user.id" v-text="user.name"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-2 col-form-label">Data Thuộc SALE</label>
                                        <div class="col-10">
                                            <select v-model="sale_id" class="form-control" style="height: 35px">
                                                <option value="">NV SALE</option>
                                                <option v-for="user in users" :key="user.id" :value="user.id" v-text="user.name"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-2 col-form-label">Tỉnh/Thành Phố</label>
                                        <div class="col-10">
                                            <validation-provider rules="required" v-slot="{ errors }">
                                                <select @change="getDistrict" v-model="province_id" name="province" class="form-control" aria-label="Default select example" required>
                                                    <option value="null" selected>Tỉnh/Thành Phố</option>
                                                    <template v-for="item in province">
                                                        <option :key="item.id" :value="item.id" v-text="item.name"></option>
                                                    </template>
                                                </select>
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-2 col-form-label">Quận/Huyện</label>
                                        <div class="col-10">
                                            <validation-provider rules="required" v-slot="{ errors }">
                                                <select @change="getWard" v-model="district_id" name="district" class="form-control" aria-label="Default select example" required>
                                                    <option value="null" selected>Quận/Huyện</option>
                                                    <template v-for="item in district">
                                                        <option :key="item.id" :value="item.id" v-text="item.name"></option>
                                                    </template>
                                                </select>
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-2 col-form-label">Phường/Xã</label>
                                        <div class="col-10">
                                            <validation-provider rules="required" v-slot="{ errors }">
                                                <select v-model="ward_id" class="form-control" name="ward" aria-label="Default select example" required>
                                                    <option value="null" selected>Phường/Xã</option>
                                                    <template v-for="item in ward">
                                                        <option :key="item.id" :value="item.id" v-text="item.name"></option>
                                                    </template>
                                                </select>
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-2 col-form-label">Địa Chỉ Chi tiết</label>
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
                        </ValidationObserver>
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
import { ValidationObserver, ValidationProvider, extend } from 'vee-validate';
import { required } from 'vee-validate/dist/rules';
extend('required', {
    ...required,
    message: 'Không được để trống'
});

export default {
    components: {
        ValidationObserver,
        ValidationProvider,
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
            name: '',
            email: '',
            phone: '',
            products: [],
            product_id: '',
            payment: 'Chuyển khoản ngân hàng',
            users: [],
            mkt_id: '',
            sale_id: '',
            province: [],
            province_id: null,
            district: [],
            district_id: null,
            ward: [],
            ward_id: null,
            address: '',
            note: '',
        }
    },
    async created() {
        await axios('/api/products').then(res => {
            this.products = res.data.data
        })
        await axios('/api/accounts').then(res => {
            this.users = res.data.data
        })
        this.getProvinces()
    },
    methods: {
        async submit() {
            if (await this.errors()) {
                let params = {
                    name: this.name,
                    email: this.email,
                    phone: this.phone,
                    product_id: this.product_id,
                    payment: this.payment,
                    mkt_id: this.mkt_id,
                    sale_id: this.sale_id,
                    province_id: this.province_id,
                    district_id: this.district_id,
                    ward_id: this.ward_id,
                    address: this.address,
                    note: this.note,
                }
                KTApp.blockPage({
                    overlayColor: "#000000",
                    state: "primary",
                    message: "Đợi Xíu...",
                })
                axios.post('/api/orders', params).then((res) => {
                    KTApp.unblockPage();
                    if (res.status == 202) {
                        toastr.success("Tài khoản này đã tồn tại!")
                    }
                    else {
                        toastr.success("Tạo đơn hàng thành công!")
                        this.$router.push('/sala-backend/don-hang/cho-xac-nhan');
                    }
                })
            }
        },
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
        },
        async errors() {
            return await this.$refs['errors'].validate();
        }
    }
}
</script>

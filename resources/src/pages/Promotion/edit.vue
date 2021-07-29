<template>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <Breadcrumb :data="subHeader" />
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="card-header card-header-tabs-line">
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-bold nav-tabs-line">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_4">
                                    <span class="nav-icon"><i class="flaticon2-gear"></i></span>
                                    <h3 class="card-title">Thông tin chung</h3>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <form ref="FormPost">
                        <ValidationObserver ref="errors">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="kt_tab_pane_1_4" role="tabpanel" aria-labelledby="kt_tab_pane_1_4">
                                    <div class="form-group row">
                                        <label for="description" class="col-2 col-form-label">Mã code</label>
                                        <div class="col-10">
                                            <validation-provider rules="required" v-slot="{ errors }">
                                                <div class="input-group">
                                                    <input disabled v-model="code" class="form-control" type="text" placeholder="Mã code" />
                                                    <div class="input-group-append m-0">
                                                        <span class="input-group-text">
                                                            <i class="flaticon2-refresh-1"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="description" class="col-2 col-form-label">Thời gian</label>
                                        <div class="col-10">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="input-group date" id="kt_datetimepicker_1" data-target-input="nearest">
                                                        <input type="text" id="datetimepicker_1" :value="start" class="form-control datetimepicker-input" placeholder="Thời gian bắt đầu" data-target="#kt_datetimepicker_1" />
                                                        <div class="input-group-append" data-target="#kt_datetimepicker_1" data-toggle="datetimepicker">
                                                            <span class="input-group-text">
                                                                <i class="ki ki-calendar"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group date" id="kt_datetimepicker_2" data-target-input="nearest">
                                                        <input type="text" id="datetimepicker_2" :value="end" class="form-control datetimepicker-input" placeholder="Thời gian kết thúc" data-target="#kt_datetimepicker_2" />
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
                                    <div class="form-group row">
                                        <label for="name" class="col-2 col-form-label">Tên</label>
                                        <div class="col-10">
                                            <validation-provider rules="required" v-slot="{ errors }">
                                                <input v-model="title" class="form-control" type="text" placeholder="Tên khuyến mãi" />
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="description" class="col-2 col-form-label">Mô tả</label>
                                        <div class="col-10">
                                            <validation-provider rules="required" v-slot="{ errors }">
                                                <textarea v-model="description" class="form-control" rows="9" id="description"></textarea>
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="categories" class="col-2 col-form-label">Kiểu</label>
                                        <div class="col-10">
                                            <validation-provider rules="required" v-slot="{ errors }">
                                                <select v-model="type" class="form-control" style="height: 35px">
                                                    <option :value="false">Theo phân trăm</option>
                                                    <option :value="true">Theo giá</option>
                                                </select>
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="description" class="col-2 col-form-label" v-text="(type == 0 ? 'Phần trăm' : 'Số tiền')"></label>
                                        <div class="col-10">
                                            <validation-provider rules="required" v-slot="{ errors }">
                                                <input v-model="number" class="form-control" type="number" :placeholder="(type == 0 ? 'Phần trăm' : 'Số tiền')" />
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </ValidationObserver>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <router-link to="/san-pham/danh-sach" type="reset" class="btn btn-light-primary mr-1 font-weight-bolder"><i class="icon-sm ki ki-long-arrow-back"></i> Quay Lại</router-link>
                    <button type="reset" @click="submit()" class="btn btn-primary mr-1"><i class="icon-sm ki ki-bold-check-1"></i> Lưu khuyễn mãi</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
import Extends from '../../extend';
import Breadcrumb from '../../components/breadcrumb/index'
import { ValidationObserver, ValidationProvider, extend } from 'vee-validate';
import { required } from 'vee-validate/dist/rules';
extend('required', {
    ...required,
    message: 'Không được để trống'
});
extend('length', {
    validate(value, { min, max }) {
        return value.length >= min && value.length <= max;
    },
    params: ['min', 'max'],
    message: 'Độ dài không hợp lệ'
});
export default {
    components: { Breadcrumb, ValidationProvider, ValidationObserver },
    data() {
        return {
            subHeader: {
                links: [
                    {
                        name: 'khuyến mãi',
                        url: '/khuyen-mai/danh-sach',
                    },
                    {
                        name: 'Thêm mới',
                        url: '/khuyen-mai/them-moi',
                    },
                ],
                action: {
                    url: '/khuyen-mai/danh-sach',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Danh Sách',
                }
            },
            id: '',
            title: '',
            type: false,
            code: '',
            start: '',
            end: '',
            number: '',
            description: '',
        }
    },
    async mounted() {
        Extends.LoadPage()
        await axios('/api/promotions/' + this.$route.params.id).then(res => {
            this.title = res.data.data.title
            this.id = res.data.data.id
            this.type = res.data.data.type
            this.code = res.data.data.code
            this.number = res.data.data.number
            this.description = res.data.data.description
            this.start = res.data.data.start
            this.end = res.data.data.end
            KTApp.unblockPage();
            KTUtil.ready(function () {
                $('#kt_datetimepicker_1').datetimepicker();
                $('#kt_datetimepicker_2').datetimepicker();
            });
        })
    },
    methods: {
        async submit() {
            if (await this.errors()) {
                let params = {
                    code: this.code,
                    start: $('#datetimepicker_1').val(),
                    end: $('#datetimepicker_2').val(),
                    title: this.title,
                    description: this.description,
                    type: this.type,
                    number: this.number,
                }
                KTApp.blockPage({
                    overlayColor: "#000000",
                    state: "primary",
                    message: "Đợi Xíu...",
                })
                axios.put('/api/promotions/' + this.id, params).then((res) => {
                    KTApp.unblockPage();
                    toastr.success("Tạo khuyến mãi thành công!")
                    this.$router.push('/khuyen-mai/danh-sach');
                })
            }
            else {
                this.$smoothScroll({
                    scrollTo: this.$refs.FormPost,
                    duration: 600,
                    offset: -50,
                })
            }
        },
        async errors() {
            return await this.$refs['errors'].validate();
        },
    },
}
</script>
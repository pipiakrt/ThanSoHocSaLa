<template>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <Breadcrumb :data="subHeader" />
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <!--begin::Card header-->
                <div class="card-header card-header-tabs-line nav-tabs-line-3x">
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                            <li class="nav-item mr-3">
                                <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_3">
                                    <span class="nav-text font-size-lg">Thay đổi mật khẩu</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form" id="kt_form">
                        <div class="tab-content">
                            <div class="tab-pane active px-7" id="kt_user_edit_tab_3" role="tabpanel">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <ValidationObserver ref="errors">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <div class="col-xl-2"></div>
                                            <div class="col-xl-7">
                                                <div class="row">
                                                    <label class="col-3"></label>
                                                    <div class="col-9">
                                                        <h6 class="text-dark font-weight-bold mb-10">Đổi mật khẩu!</h6>
                                                    </div>
                                                </div>
                                                <!--end::Row-->
                                                <!--begin::Group-->
                                                <div class="form-group row">
                                                    <label class="col-form-label col-3 text-lg-right text-left">Mật khẩu cũ</label>
                                                    <div class="col-9">
                                                        <validation-provider rules="required|length:0,255" v-slot="{ errors }">
                                                            <input v-model="currentpassword" class="form-control form-control-lg form-control-solid mb-1" type="password" />
                                                            <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                                        </validation-provider>
                                                    </div>
                                                </div>
                                                <!--end::Group-->
                                                <!--begin::Group-->
                                                <div class="form-group row">
                                                    <label class="col-form-label col-3 text-lg-right text-left">Mật khẩu mới</label>
                                                    <div class="col-9">
                                                        <validation-provider rules="required|length:0,255" v-slot="{ errors }">
                                                            <input v-model="password" class="form-control form-control-lg form-control-solid mb-1" type="password" />
                                                            <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                                        </validation-provider>
                                                    </div>
                                                </div>
                                                <!--end::Group-->
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                    </ValidationObserver>
                                </div>
                                <!--end::Body-->
                                <!--begin::Footer-->
                                <div class="card-footer pb-0">
                                    <div class="row">
                                        <div class="col-xl-2"></div>
                                        <div class="col-xl-7">
                                            <div class="row">
                                                <div class="col-3"></div>
                                                <div class="col-9">
                                                    <a @click="submit" class="btn btn-light-primary font-weight-bold">Thay đổi</a>
                                                    <a href="#" class="btn btn-clean font-weight-bold">Đóng</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Footer-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Extends from '../../extend';
import Breadcrumb from '../../components/breadcrumb/index'
import {
    ValidationObserver,
    ValidationProvider,
    extend
} from 'vee-validate';
export default {
    components: {
        Breadcrumb,
        ValidationObserver,
        ValidationProvider
    },
    data() {
        return {
            subHeader: {
                links: [{
                    name: 'Mật khẩu',
                    url: '/tai-khoan/mat-khau',
                }, ],
                action: {
                    url: '/',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Dashboard',
                },
            },
            currentpassword: '',
            password: '',
            email: '',
            id: ''
        }
    },
    created() {
        Extends.LoadPage()
        axios('/api/accounts/users').then(res => {
            KTApp.unblockPage();
            this.email = res.data.email,
                this.id = res.data.id
        })
    },
    methods: {
        async submit() {
            if (await this.errors()) {
                let params = {
                    currentpassword: this.currentpassword,
                    password: this.password,
                    email: this.email,
                    id: this.id,
                }
                Extends.LoadPage()
                axios.put('/api/accounts/user', params).then((res) => {
                    KTApp.unblockPage();
                    if (res.status == 200) {
                        Swal.fire(
                            "Thành Công!",
                            "Đã cập nhật tài khoản.",
                            "success"
                        )
                    } else {
                        Swal.fire("Thông báo!", "Chưa được xác thực!", "error");
                    }
                })
            }
        },
        async errors() {
            return await this.$refs['errors'].validate();
        },
    },
}
</script>

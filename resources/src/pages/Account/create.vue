<template>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <Breadcrumb :data="subHeader" />
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line nav-tabs-line-3x">
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                            <li class="nav-item mr-3">
                                <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1">
                                    <span class="nav-text font-size-lg">Thêm Tài Khoản</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form" id="kt_form">
                        <ValidationObserver ref="errors">
                            <div class="tab-content">
                                <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-xl-2"></div>
                                        <div class="col-xl-7 my-2">
                                            <div class="row">
                                                <label class="col-3"></label>
                                                <div class="col-9">
                                                    <h6 class="text-dark font-weight-bold mb-10">Thông tin chung</h6>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-right text-left">Ảnh đại diện</label>
                                                <div class="col-9">
                                                    <div class="image-input image-input-empty image-input-outline background-position-center" :style="`background-image: url('${preview ? preview : '/img/avatar.png'}')`">
                                                        <div class="image-input-wrapper"></div>
                                                        <label @click="model = true" data-toggle="modal" data-target="#filemanager" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change">
                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                        </label>
                                                        <span v-if="preview" @click="preview = ''" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow d-flex" data-action="remove">
                                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-right text-left">Tên</label>
                                                <div class="col-9">
                                                    <validation-provider rules="required|length:0,255" v-slot="{ errors }">
                                                        <input v-model="name" class="form-control form-control-lg form-control-solid" type="text" />
                                                        <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                                    </validation-provider>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-right text-left">Email</label>
                                                <div class="col-9">
                                                    <validation-provider rules="required|email|length:0,255" v-slot="{ errors }">
                                                        <input v-model="email" class="form-control form-control-lg form-control-solid" type="email" />
                                                        <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                                    </validation-provider>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-right text-left">Mật khẩu</label>
                                                <div class="col-9">
                                                    <validation-provider rules="required|length:0,255" v-slot="{ errors }">
                                                        <div class="input-group">
                                                            <input v-model="password" class="form-control form-control-lg form-control-solid" type="text" />
                                                            <div @click="generate()" class="input-group-append m-0">
                                                                <span class="input-group-text">
                                                                    <i class="flaticon2-refresh-1"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                                    </validation-provider>
                                                    <div class="text-left mt-7">
                                                        <button @click="submit()" type="reset" class="btn btn-primary mr-2">Tạo tài khoản</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </ValidationObserver>
                    </form>
                    <div v-if="model" class="modal fade" id="filemanager">
                        <div class="modal-dialog modal-full min-vh-100">
                            <div class="modal-content min-vh-100">
                                <div class="modal-body">
                                    <FileManage :getUrl="true" @url="setUrl($event)" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal hide" id="infoUser" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hoàn Tất!</h5>
                                    <button @click="resetForm()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i aria-hidden="true" class="ki ki-close"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Tài khoản: <b v-text="email"></b></p>
                                    <p>Mật khẩu: <b v-text="password"></b></p>
                                </div>
                                <div class="modal-footer">
                                    <button @click="resetForm()" type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Đóng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Extends from '../../extend';
import Breadcrumb from '../../components/breadcrumb/index'
import FileManage from '../../components/FileManager/index'
import {
    ValidationObserver,
    ValidationProvider,
    extend
} from 'vee-validate';
import {
    required,
    email
} from 'vee-validate/dist/rules';
extend('required', {
    ...required,
    message: 'Không được để trống'
});
extend('length', {
    validate(value, {
        min,
        max
    }) {
        return value.length >= min && value.length <= max;
    },
    params: ['min', 'max'],
    message: 'Độ dài không hợp lệ'
});
extend('email', {
    ...email,
    message: 'Email không hợp lệ'
});
export default {
    components: {
        FileManage,
        Breadcrumb,
        ValidationProvider,
        ValidationObserver
    },
    data() {
        return {
            subHeader: {
                links: [{
                        name: 'Ảnh bìa',
                        url: '/anh-bia/danh-sach',
                    },
                    {
                        name: 'Thêm mới',
                        url: '/anh-bia/them-moi',
                    },
                ],
                action: {
                    url: '/anh-bia/danh-sach',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Danh sách',
                },
            },
            preview: '',
            name: '',
            email: '',
            password: '',
            model: false
        }
    },
    methods: {
        setUrl(path) {
            $('#filemanager').modal('hide');
            this.preview = path
        },
        resetForm() {
            this.preview = ''
            this.name = ''
            this.email = ''
            this.password = ''
            this.$refs['errors'].reset();
        },
        async submit() {
            if (await this.errors()) {
                Extends.LoadPage()
                let params = {
                    avatar: this.preview,
                    name: this.name,
                    email: this.email,
                    password: this.password,
                }
                axios.post('/api/auth', params).then((res) => {
                    KTApp.unblockPage();
                    if (res.status == 201) {
                        $('#infoUser').modal('show');
                    } else if (res.status == 202) {
                        Swal.fire("Rất Tiếc!", "Tài khoản này đã tồn tại, hãy sử dụng tài khoản khác!", "warning");
                    }
                })
            }
        },
        async errors() {
            return await this.$refs['errors'].validate();
        },
        generate() {
            var length = 8,
                charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
                retVal = "";
            for (var i = 0, n = charset.length; i < length; ++i) {
                retVal += charset.charAt(Math.floor(Math.random() * n));
            }
            this.password = retVal;
        }
    },
}
</script>

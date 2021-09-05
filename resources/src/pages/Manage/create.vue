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
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-right text-left">Phòng ban</label>
                                                <div class="col-9">
                                                    <select v-model="type" class="form-control" style="height: 35px">
                                                        <template v-for="item in phongban">
                                                            <option :key="item.type" :value="item.type" v-text="item.name"></option>
                                                        </template>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-right text-left">Vịt trí</label>
                                                <div class="col-9">
                                                    <input v-model="vitri" class="form-control" type="text" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-right text-left">Quyền</label>
                                                <div class="col-9">
                                                    <select id="permission" class="form-control" multiple="multiple" style="height: 35px">
                                                        <option value="administrator" style="display: none">Administrator</option>
                                                        <template v-for="item in list_permissions">
                                                            <option :key="item.type" :value="item.type" v-text="item.name" style="display: none"></option>
                                                        </template>
                                                    </select>
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
        Breadcrumb,
        ValidationProvider,
        ValidationObserver
    },
    data() {
        return {
            subHeader: {
                links: [{
                        name: 'Ảnh bìa',
                        url: '/sala-backend/anh-bia/danh-sach',
                    },
                    {
                        name: 'Thêm mới',
                        url: '/sala-backend/anh-bia/them-moi',
                    },
                ],
                action: {
                    url: '/sala-backend/anh-bia/danh-sach',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Danh sách',
                },
            },
            preview: '',
            name: '',
            email: '',
            password: '',
            type: '',
            vitri: '',
            phongban: [
                {
                    name: "Giám Đốc",
                    type: "giam-doc",
                },
                {
                    name: "Marketting",
                    type: "marketting",
                },
                {
                    name: "Sale / Chốt đơn",
                    type: "sale",
                },
                {
                    name: "Kho Vận",
                    type: "kho-van",
                },
                {
                    name: "Hành chính - Nhân sự",
                    type: "htns",
                },
                {
                    name: "Kế toán",
                    type: "ke-toan",
                },
            ],
            model: [
                {
                    name: "Sản phẩm",
                    type: "App_Models_Product",
                },
                {
                    name: "Tin tức",
                    type: "App_Models_Post",
                },
                {
                    name: "Đơn hàng",
                    type: "App_Models_Order",
                },
                {
                    name: "Luận giải",
                    type: "App_Models_ThanSo",
                },
                {
                    name: "Tài khoản",
                    type: "App_Models_User",
                },
                {
                    name: "Phần quyền",
                    type: "App_Models_Permission",
                },
            ],
            action: [
                {
                    name: "Xem danh sách",
                    type: "viewAny",
                },
                {
                    name: "Xem chi tiết",
                    type: "view",
                },
                {
                    name: "Tạo",
                    type: "create",
                },
                {
                    name: "Cập nhật",
                    type: "update",
                },
                {
                    name: "Xóa",
                    type: "delete",
                },
                {
                    name: "Xóa hàng loạt",
                    type: "forceDelete",
                },
            ],
            list_permissions: []
        }
    },
    created() {
        this.model.forEach(model => {
            this.action.forEach(action => {
                this.list_permissions.push({
                    name: action.name + " " + model.name,
                    type: model.type.replaceAll("_", "\\") + "-" + action.type,
                })
            });
        });
    },
    mounted() {
        KTUtil.ready(function () {
            $('#permission').select2({
                placeholder: "Chọn quyền",
            });
        });
    },
    methods: {
        resetForm() {
            this.preview = ''
            this.type = ''
            this.vitri = ''
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
                    type: this.type,
                    vitri: this.vitri,
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    permission: $('#permission').select2("val"),
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

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
                                    <span class="nav-icon">
                                        <span class="svg-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                                                    <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="nav-text font-size-lg">Tài khoản</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <ValidationObserver ref="errors">
                        <div class="tab-content">
                            <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                                <div class="row">
                                    <div class="col-xl-2"></div>
                                    <div class="col-xl-7 my-2">
                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Ảnh</label>
                                            <div class="col-9">
                                                <div class="image-input image-input-empty image-input-outline background-position-center" :style="`background-image: url('${avatar ? avatar : '/img/avatar.png'}')`">
                                                    <div class="image-input-wrapper"></div>
                                                    <label @click="model = true" data-toggle="modal" data-target="#filemanager" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                    </label>
                                                    <span v-if="avatar" @click="avatar = ''" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow d-flex" data-action="remove">
                                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Họ tên</label>
                                            <div class="col-9">
                                                <validation-provider rules="required|length:0,255" v-slot="{ errors }">
                                                    <input v-model="name" class="form-control form-control-lg form-control-solid" type="text" />
                                                    <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                                </validation-provider>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Tài khoản</label>
                                            <div class="col-9">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input disabled type="text" class="form-control form-control-lg form-control-solid" :value="email" />
                                                </div>
                                                <div class="text-left mt-7">
                                                    <button @click="submit()" class="btn btn-primary mr-2">Cập nhật</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ValidationObserver>
                </div>
            </div>
        </div>
    </div>
    <div v-if="model" class="modal fade" id="filemanager">
        <div class="modal-dialog modal-full min-vh-100">
            <div class="modal-content min-vh-100">
                <div class="modal-body">
                    <FileManage :getUrl="true" @url="setUrl($event)" />
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
import { ValidationObserver, ValidationProvider, extend } from 'vee-validate';
import { required } from 'vee-validate/dist/rules';
extend('required', {
    ...required,
    message: 'Không được để trống'
});
export default {
    components: {
        Breadcrumb,
        FileManage,
        ValidationObserver,
        ValidationProvider
    },
    data() {
        return {
            subHeader: {
                links: [{
                        name: 'Thông tin',
                        url: '/tai-khoan/thong-tin',
                    },
                    {
                        name: 'Thêm mới',
                        url: '/tai-khoan/them-moi',
                    },
                ],
                action: {
                    url: '/',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Dashboard',
                },
            },
            email: '',
            name: '',
            avatar: '',
            model: false
        }
    },
    created() {
        Extends.LoadPage()
        axios('/api/accounts/users').then(res => {
            KTApp.unblockPage();
            this.email = res.data.email
            this.name = res.data.name
            this.avatar = res.data.avatar
        })
    },
    methods: {
        setUrl(path) {
            $('#filemanager').modal('hide');
            this.avatar = path
        },
        async submit() {
            if (await this.errors()) {
                let params = {
                    avatar: this.avatar,
                    name: this.name,
                }
                Extends.LoadPage()
                axios.put('/api/accounts/user', params).then((res) => {
                    KTApp.unblockPage();
                    Swal.fire(
                        "Thành Công!",
                        "Đã cập nhật tài khoản.",
                        "success"
                    )
                })
            }
        },
        async errors() {
            return await this.$refs['errors'].validate();
        },
    },
}
</script>

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
                                        <label for="name" class="col-2 col-form-label">Tên</label>
                                        <div class="col-10">
                                            <validation-provider rules="required|length:0,255" v-slot="{ errors }">
                                                <input v-model="title" class="form-control" type="text" placeholder="Tên thông báo" />
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="slug" class="col-2 col-form-label">Liên kết</label>
                                        <div class="col-10">
                                            <validation-provider rules="required|length:0,255" v-slot="{ errors }">
                                                <input v-model="link" class="form-control" type="search" placeholder="Đường dấn" />
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="description" class="col-2 col-form-label">Mô tả</label>
                                        <div class="col-10">
                                            <validation-provider rules="required|length:0,255" v-slot="{ errors }">
                                                <textarea v-model="description" class="form-control" rows="9" id="description" placeholder="Mô tả"></textarea>
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="avatar" class="col-2 col-form-label">Ảnh thông báo</label>
                                        <div class="col-10">
                                            <div class="image-input image-input-empty image-input-outline background-position-center" :style="`background-image: url('${preview ? preview : '/img/avatar.png'}')`">
                                                <div class="image-input-wrapper"></div>
                                                <label @click="modal = true" data-toggle="modal" data-target="#filemanager" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                </label>
                                                <span v-if="avatar" @click="avatar = ''" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow d-flex" data-action="remove">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </ValidationObserver>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <router-link to="/san-pham/danh-sach" type="reset" class="btn btn-light-primary mr-1 font-weight-bolder"><i class="icon-sm ki ki-long-arrow-back"></i> Quay Lại</router-link>
                    <button type="reset" @click="submit()" class="btn btn-primary mr-1"><i class="icon-sm ki ki-bold-check-1"></i> Lưu thông báo</button>
                </div>
            </div>
        </div>
    </div>
    <div v-if="modal" class="modal fade" id="filemanager">
        <div class="modal-dialog modal-full min-vh-100">
            <div class="modal-content min-vh-100">
                <div class="modal-body">
                    <FileManage :getUrl="true" @url="setUrl($event)"/>
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
extend('length', {
    validate(value, { min, max }) {
        return value.length >= min && value.length <= max;
    },
    params: ['min', 'max'],
    message: 'Độ dài không hợp lệ'
});
var typeimage = 'avatar';
export default {
    components: { FileManage, Breadcrumb, ValidationProvider, ValidationObserver },
    data() {
        return {
            subHeader: {
                links: [
                    {
                        name: 'thông báo',
                        url: '/thong-bao/danh-sach',
                    },
                    {
                        name: 'Thêm mới',
                        url: '/thong-bao/them-moi',
                    },
                ],
                action: {
                    url: '/thong-bao/danh-sach',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Danh Sách',
                }
            },
            modal: false,
            file: '',
            preview: '',
            title: '',
            link: '',
            description: '',
        }
    },
    methods: {
        setTypeGetImg() {
            typeimage = 'avatar'
        },
        setUrl(path) {
            console.log(path)
            $('#filemanager').modal('hide');
            if (typeimage == 'summernote') {
                var image = $('<img>').attr('src', path);
                $('.summernote').summernote("insertNode", image[0]);
            }
            else {
                this.preview = path
            }
        },
        async submit() {
            if (await this.errors()) {
                let params = {
                    title: this.title,
                    link: this.link,
                    avatar: this.preview,
                    description: this.description,
                }
                KTApp.blockPage({
                    overlayColor: "#000000",
                    state: "primary",
                    message: "Đợi Xíu...",
                })
                axios.post('/api/notifications', params).then((res) => {
                    KTApp.unblockPage();
                    toastr.success("Tạo thông báo thành công!")
                    this.$router.push('/thong-bao/danh-sach');
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
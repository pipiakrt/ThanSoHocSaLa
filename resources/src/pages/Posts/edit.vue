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
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_6">
                                    <span class="nav-icon"><i class="flaticon2-pen"></i></span>
                                    <h3 class="card-title">Nội dung</h3>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_5">
                                    <span class="nav-icon"><i class="flaticon2-drop"></i></span>
                                    <h3 class="card-title">Seo</h3>
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
                                                <input v-model="name" class="form-control" type="text" placeholder="Tên bài viết" />
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="slug" class="col-2 col-form-label">URL</label>
                                        <div class="col-10">
                                            <validation-provider rules="required|length:0,255" v-slot="{ errors }">
                                                <input v-model="slug" class="form-control" type="search" placeholder="Đường dấn" />
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="categories" class="col-2 col-form-label">Danh mục</label>
                                        <div class="col-10">
                                            <validation-provider rules="required" v-slot="{ errors }">
                                                <select v-model="category" class="form-control" style="height: 35px">
                                                    <option value="" selected>Chọn danh mục</option>
                                                    <template v-for="item in categories">
                                                        <option :key="item.id" v-if="item.parent_id > 0" :value="item.id" v-text="item.name"></option>
                                                    </template>
                                                </select>
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="avatar" class="col-2 col-form-label">Ảnh bài viết</label>
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
                                <div class="tab-pane fade" id="kt_tab_pane_2_6" role="tabpanel" aria-labelledby="kt_tab_pane_2_6">
                                    <div class="form-group row">
                                        <label for="description" class="col-10 col-form-label">Mô tả</label>
                                        <div class="col-10">
                                            <textarea v-model="description" class="form-control" rows="9" id="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kt_summernote_1" class="col-10 col-form-label">Nội dung</label>
                                        <div class="col-10">
                                            <div class="summernote" id="kt_summernote_1"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kt_tab_pane_2_5" role="tabpanel" aria-labelledby="kt_tab_pane_2_5">
                                    <div class="form-group row">
                                        <label for="seo_title" class="col-2 col-form-label">Seo Title</label>
                                        <div class="col-10">
                                            <input v-model="seo_title" class="form-control" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-2 col-form-label">Seo Description</label>
                                        <div class="col-10">
                                            <textarea v-model="seo_description" class="form-control" rows="9" id="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="seo_keyword" class="col-2 col-form-label">Seo Keyword</label>
                                        <div class="col-10">
                                            <textarea v-model="seo_keyword" class="form-control" rows="9" id="description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </ValidationObserver>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <router-link to="/san-pham/danh-sach" type="reset" class="btn btn-light-primary mr-1 font-weight-bolder"><i class="icon-sm ki ki-long-arrow-back"></i> Quay Lại</router-link>
                    <button type="reset" @click="submit(1)" class="btn btn-primary mr-1"><i class="icon-sm ki ki-bold-check-1   "></i> Lưu Sản phẩm</button>
                    <button type="reset" @click="submit(0)" class="btn btn-primary mr-1"><i class="icon-sm ki ki-info"></i> Lưu Ẩn</button>
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
                        name: 'Bài viết',
                        url: '/bai-viet/danh-sach',
                    },
                    {
                        name: 'Thêm mới',
                        url: '/bai-viet/them-moi',
                    },
                ],
                action: {
                    url: '/bai-viet/danh-sach',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Danh Sách',
                }
            },
            modal: false,
            name: '',
            file: '',
            preview: '',
            id: '',
            slug: '',
            description: '',
            categories: [],
            category: '',
            seo_title: '',
            seo_description: '',
            seo_keyword: '',
            content: '',
            errorCategories: false,
            errorContent: false
        }
    },
    watch: {
        name() {
            this.slug = Extends.ChangeToSlug(this.name)
        },
    },
    async mounted() {
        Extends.LoadPage()
        axios('/api/categories?type=post').then(res => {
            this.categories = res.data.data
        })
        await axios('/api/posts/' + this.$route.params.id).then(res => {
            console.log(res)
            this.id = res.data.data.id
            this.post = res.data.data
            this.name = this.post.name
            this.slug = this.post.slug
            this.preview = this.post.url
            this.description = this.post.description
            this.category = this.post.category_id
            this.seo_title = res.data.data.seo_title
            this.seo_description = res.data.data.seo_description
            this.seo_keyword = res.data.data.seo_keyword

            KTApp.unblockPage();
            KTUtil.ready(function () {
                var HelloButton = function (context) {
                    var ui = $.summernote.ui;
                    var button = ui.button({
                        contents: '<i class="fa far fa-folder"/>',
                        tooltip: 'Folder',
                        click: function () {
                            typeimage = 'summernote';
                            $('#filemanager').modal('show');
                        }
                    });
                    return button.render(); 
                }
                $('.summernote').summernote({
                    height: 350,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['mybutton', ['hello']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ],
                    buttons: {
                        hello: HelloButton
                    },
                    callbacks: {
                        onImageUpload: function(files) {
                            let formdata = new FormData();
                            formdata.append("file", files[0]);
                            formdata.append("summernote", true);
                            axios.post('/api/images', formdata).then(res => {
                                var image = $('<img>').attr('src', res.data);
                                $('.summernote').summernote("insertNode", image[0]);
                            })
                        },
                    },
                });
                $('.summernote').summernote('code', res.data.data.content)
            });
        })
    },
    methods: {
        setTypeGetImg() {
            typeimage = 'avatar'
        },
        setUrl(path) {
            $('#filemanager').modal('hide');
            if (typeimage == 'summernote') {
                var image = $('<img>').attr('src', path);
                $('.summernote').summernote("insertNode", image[0]);
            }
            else {
                this.preview = path
            }
        },
        async submit(status) {
            if (await this.errors()) {
                let params = {
                    name: this.name,
                    slug: this.slug,
                    category_id: this.category,
                    image: this.preview,
                    seo_title: this.seo_title,
                    seo_description: this.seo_description,
                    seo_keyword: this.seo_keyword,
                    description: this.description,
                    content: $('.summernote').summernote('code'),
                    status: String(status),
                }
                KTApp.blockPage({
                    overlayColor: "#000000",
                    state: "primary",
                    message: "Đợi Xíu...",
                })
                axios.put('/api/posts/' + this.id, params).then((res) => {
                    KTApp.unblockPage();
                    toastr.success("Tạo Bài viết thành công!")
                    this.$router.push('/bai-viet/danh-sach');
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
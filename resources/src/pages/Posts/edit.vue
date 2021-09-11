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
                                <div class="form-group mb">
                                    <div class="alert alert-custom alert-default" role="alert">
                                        <div class="alert-icon">
                                            <i class="ki ki-outline-info icon-2x text-primary"></i>
                                        </div>
                                        <div class="alert-text">Lưu ý <code>URL</code> Không nên để khoảng trống!</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Tên</label>
                                    <div class="col-10">
                                        <input v-model="name" class="form-control" type="text" placeholder="Tên bài viết" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="slug" class="col-2 col-form-label">URL</label>
                                    <div class="col-10">
                                        <input v-model="slug" class="form-control" type="search" placeholder="Đường dấn" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="categories" class="col-2 col-form-label">Danh mục</label>
                                    <div class="col-10">
                                        <select v-model="category" class="form-control" style="height: 35px">
                                            <option value="" selected>Chọn danh mục</option>
                                            <template v-for="item in categories">
                                                <option :key="item.id" :value="item.id" v-text="item.name"></option>
                                            </template>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="chuyenmuc" class="col-2 col-form-label">Chuyên mục</label>
                                    <div class="col-10">
                                        <select class="form-control" id="chuyenmuc" multiple="multiple" style="height: 35px">
                                            <option v-for="item in chuyenmuc" :key="item.id" v-text="item.name" :value="item.id" style="display: none"></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="keyword" class="col-2 col-form-label">Tag</label>
                                    <div class="col-10">
                                        <select class="form-control" id="keyword" multiple="multiple" style="height: 35px">
                                            <option v-for="item in tags" :key="item.id" v-text="item.name" :value="item.id" style="display: none"></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="slug" class="col-2 col-form-label">Tác giả</label>
                                    <div class="col-10">
                                        <input v-model="author" class="form-control" type="search" placeholder="Tác giả" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="categories" class="col-2 col-form-label">Loại bài viết</label>
                                    <div class="col-10">
                                        <select v-model="type" class="form-control" style="height: 35px">
                                            <option value="post">Tin tức</option>
                                            <option value="introduce">Giới thiệu</option>
                                            <option value="qa">Hỏi đáp</option>
                                            <option value="story">Câu truyện</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="avatar" class="col-2 col-form-label">Ảnh bài viết</label>
                                    <div class="col-10">
                                        <div class="image-input image-input-empty image-input-outline background-position-center" :style="`background-image: url('${avatar ? avatar : '/img/avatar.png'}')`">
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
                                <div class="form-group row">
                                    <label for="description" class="col-2 col-form-label">Mô tả</label>
                                    <div class="col-10">
                                        <textarea v-model="description" class="form-control" placeholder="Mô tả" rows="9" id="description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kt_summernote_1" class="col-2 col-form-label">Nội dung</label>
                                    <div class="col-10">
                                        <div class="summernote" id="kt_summernote_1"></div>
                                        <div v-if="errorContent" class="invalid-feedback d-block">Không được để trống</div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card-footer text-center">
                            <router-link to="/sala-backend/bai-viet/danh-sach" type="reset" class="btn btn-light-primary mr-1 font-weight-bolder"><i class="icon-sm ki ki-long-arrow-back"></i> Quay Lại</router-link>
                            <button type="reset" @click="submit(1)" class="btn btn-primary mr-1"><i class="icon-sm ki ki-bold-check-1   "></i> Lưu Bài Viết</button>
                            <button type="reset" @click="submit(0)" class="btn btn-primary mr-1"><i class="icon-sm ki ki-info"></i> Lưu Ẩn</button>
                        </div>
                    </div>
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
import FileManage from '../../components/FileManager/index'
import Breadcrumb from '../../components/breadcrumb/index'

var typeimage = 'avatar';
export default {
    components: {
        Breadcrumb, FileManage
    },
    data() {
        return {
            subHeader: {
                links: [{
                        name: 'Bài viết',
                        url: '/sala-backend/bai-viet/danh-sach',
                    },
                    {
                        name: 'Thêm mới',
                        url: '/sala-backend/bai-viet/them-moi',
                    },
                ],
                action: {
                    url: '/sala-backend/bai-viet/danh-sach',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Danh Sách',
                }
            },
            modal: false,
            id: '',
            name: '',
            slug: '',
            avatar: '',
            author: '',
            description: '',
            content: '',
            type: "",
            categories: [],
            category: '',
            tags: [],
            chuyenmuc: [],
        }
    },
    watch: {
        name() {
            this.slug = Extends.ChangeToSlug(this.name)
        },
    },
    async mounted() {
        await axios('/api/categories').then(res => {
            this.categories = res.data.data
        })
        await axios('/api/tags').then(res => {
            this.tags = res.data.data
            KTUtil.ready(function () {
                $('#keyword').select2({
                    placeholder: "Chọn tag",
                });
            });
        })
        await axios('/api/chuyenmuc').then(res => {
            this.chuyenmuc = res.data.data
            KTUtil.ready(function () {
                $('#chuyenmuc').select2({
                    placeholder: "Chọn chuyên mục",
                });
            });
        })
        await axios('/api/posts/' + this.$route.params.id).then(res => {
            this.id = res.data.data.id
            this.name = res.data.data.name
            this.slug = res.data.data.slug
            this.avatar = res.data.data.image
            this.category = res.data.data.category_id
            this.author = res.data.data.author
            this.description = res.data.data.description
            this.type = res.data.data.type

            let tagId = [];
            res.data.data.tags.forEach(item => {
                tagId.push(item.id)
            });
            $('#keyword').val(tagId);
            $('#keyword').trigger('change');

            let cmId = [];
            res.data.data.chuyenmuc.forEach(item => {
                cmId.push(item.id)
            });
            $('#chuyenmuc').val(cmId);
            $('#chuyenmuc').trigger('change');

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
                    lineHeights: ['0.2', '0.3', '0.4', '0.5', '0.6', '0.8', '1.0', '1.2', '1.4', '1.5', '2.0', '3.0'],
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'italic', 'strikethrough', 'clear']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'hr']],
                        ['mybutton', ['hello']],
                        ['view', ['fullscreen', 'codeview', 'help']],
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
            console.log(path)
            $('#filemanager').modal('hide');
            if (typeimage == 'summernote') {
                var image = $('<img>').attr('src', path);
                $('.summernote').summernote("insertNode", image[0]);
            }
            else {
                this.avatar = path
            }
        },
        async submit(status) {
            let params = {
                name: this.name,
                slug: this.slug,
                author: this.author,
                type: this.type,
                image: this.avatar,
                category_id: this.category,
                keyword: $('#keyword').select2("val"),
                chuyenmuc: $('#chuyenmuc').select2("val"),
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
                this.$router.push('/sala-backend/bai-viet/danh-sach');
            })
        }
    }
}
</script>

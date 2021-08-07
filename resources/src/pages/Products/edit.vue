<style>
.background-position-center {
    background-position: center
}
.tab-pane {
    overflow: hidden;
}
</style>

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
                                        <input v-model="name" class="form-control" type="text" placeholder="Tên Gói Sản phẩm" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="slug" class="col-2 col-form-label">URL</label>
                                    <div class="col-10">
                                        <input v-model="slug" class="form-control" type="search" placeholder="Đường dấn" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="price" class="col-2 col-form-label">Giá Gốc</label>
                                    <div class="col-10">
                                        <input v-model="price_origin" class="form-control" type="text" placeholder="Giá bán" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="price" class="col-2 col-form-label">Giá bán</label>
                                    <div class="col-10">
                                        <input v-model="price" class="form-control" type="text" placeholder="Giá bán" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-2 col-form-label">Ảnh sản phẩm</label>
                                    <div class="col-10">
                                        <div class="image-input image-input-empty image-input-outline background-position-center" :style="`background-image: url('${image ? image : '/img/avatar.png'}')`">
                                            <div class="image-input-wrapper"></div>
                                            <label @click="modal = true" data-toggle="modal" data-target="#filemanager" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                            </label>
                                            <span v-if="image" @click="image = ''" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow d-flex" data-action="remove">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row pb-5" v-for="(items, i) in promotion" :key="i">
                                    <label for="video" class="col-2 col-form-label">Khuyễn mại</label>
                                    <div class="col-10">
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                <input v-model="items.title" placeholder="Tiêu đề" class="form-control" type="text" />
                                            </div>
                                            <div class="col-12 mt-3">
                                                <input v-model="items.total" placeholder="Tổng giá trị" class="form-control" type="text" />
                                            </div>
                                            <div class="col-12">
                                                <template v-for="(item, key) in items.options">
                                                    <div class="row mt-5" :key="key">
                                                        <div class="col-5">
                                                            <input v-model="item.key" placeholder="Tên khuyễn mãi" class="form-control" type="text" />
                                                        </div>
                                                        <div class="col-5">
                                                            <input v-model="item.val" placeholder="Trị giá" class="form-control" type="text" />
                                                        </div>
                                                        <div class="col-2">
                                                            <button type="button" v-if="items.options.length > 1" @click="items.options.length == 1 ? promotion.splice(i, 1) : items.options.splice(key, 1)" class="btn btn-block btn-warning">Loại bỏ</button>
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>
                                            <div class="col-10 mt-5">
                                                <button @click="items.options.push({key: '', val: ''})" type="button" class="btn btn-block btn-outline-secondary">Thêm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-2 col-form-label">Mô tả</label>
                                    <div class="col-10">
                                        <textarea v-model="description" class="form-control" rows="9" id="description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kt_summernote_1" class="col-2 col-form-label">Nội dung</label>
                                    <div class="col-10">
                                        <div class="summernote" id="kt_summernote_1"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card-footer text-center">
                            <router-link to="/admin/seo/danh-sach" type="reset" class="btn btn-light-primary mr-1 font-weight-bolder"><i class="icon-sm ki ki-long-arrow-back"></i> Quay Lại</router-link>
                            <button type="reset" @click="submit(1)" class="btn btn-primary mr-1"><i class="icon-sm ki ki-bold-check-1   "></i> Lưu sản phẩm</button>
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

var typeimage = 'image';
export default {
    components: { FileManage, Breadcrumb },
    data() {
        return {
            subHeader: {
                links: [{
                        name: 'Sản phẩm',
                        url: '/admin/san-pham/danh-sach',
                    },
                    {
                        name: 'Thêm mới',
                        url: '/admin/san-pham/them-moi',
                    },
                ],
                action: {
                    url: '/admin/san-pham/danh-sach',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Danh Sách',
                }
            },
            promotion: [
                {
                    title: '',
                    total: '',
                    options: [
                        {
                            key: '',
                            val: '',
                        }
                    ]
                }
            ],
            modal: false,
            id: '',
            image: '',
            name: '',
            slug: '',
            price_origin: '',
            price: '',
            description: '',
            content: '',
        }
    },
    watch: {
        name() {
            this.slug = Extends.ChangeToSlug(this.name)
        },
    },
    mounted() {
        axios('/api/products/' + this.$route.params.id).then(res => {
            this.id = res.data.data.id
            this.name = res.data.data.name
            this.slug = res.data.data.slug
            this.image = res.data.data.image
            this.price_origin = res.data.data.price_origin
            this.price = res.data.data.price
            this.description = res.data.data.description
            this.promotion = res.data.data.promotion
            this.content = res.data.data.content

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
                        onImageUpload: function (files) {
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
        });
    },
    methods: {
        setTypeGetImg() {
            typeimage = 'image'
        },
        setUrl(path) {
            console.log(path)
            $('#filemanager').modal('hide');
            if (typeimage == 'summernote') {
                var image = $('<img>').attr('src', path);
                $('.summernote').summernote("insertNode", image[0]);
            }
            else {
                this.image = path
            }
        },
        async submit(status) {
            let params = {
                name: this.name,
                slug: this.slug,
                price_origin: this.price_origin,
                price: this.price,
                image: this.image,
                promotion: this.promotion,
                description: this.description,
                content: $('.summernote').summernote('code'),
                status: String(status)
            }
            KTApp.blockPage({
                overlayColor: "#000000",
                state: "primary",
                message: "Đợi Xíu...",
            })
            axios.put('/api/products/' + this.id, params).then((res) => {
                KTApp.unblockPage();
                toastr.success("Tạo Sản phẩm thành công!")
                this.$router.push('/admin/san-pham/danh-sach');
            })
        }
    }
}
</script>

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
                                    <label for="sort" class="col-2 col-form-label">Thứ Tự</label>
                                    <div class="col-10">
                                        <input v-model="sort" class="form-control" type="number" placeholder="Thứ tự sản phẩm" />
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
                                            <label @click="setTypeImage('avatar')" data-toggle="modal" data-target="#filemanager" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change">
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

                                <div class="form-group row pb-5">
                                    <label for="video" class="col-2 col-form-label">Tiêu đề chi tiết gói</label>
                                    <div class="col-10">
                                        <div class="row">
                                            <div class="col-12">
                                                <template v-for="(item, key) in options.title">
                                                    <div class="row mt-5" :key="key">
                                                        <div class="col-10">
                                                            <input v-model="item.name" placeholder="Tiêu đề" class="form-control" type="text" />
                                                        </div>
                                                        <div class="col-2">
                                                            <button type="button" v-if="options.title.length > 1" @click="options.title.length == 1 ? false : options.title.splice(key, 1)" class="btn btn-block btn-warning">Loại bỏ</button>
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>
                                            <div class="col-10 mt-5">
                                                <button @click="options.title.push({ name: '' })" type="button" class="btn btn-block btn-outline-secondary">Thêm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row pb-5">
                                    <label for="video" class="col-2 col-form-label">Tiêu đề phụ</label>
                                    <div class="col-10">
                                        <div class="row">
                                            <div class="col-12">
                                                <template v-for="(item, key) in options.title2">
                                                    <div class="row mt-5" :key="key">
                                                        <div class="col-10">
                                                            <input v-model="item.name" placeholder="Tiêu đề" class="form-control" type="text" />
                                                        </div>
                                                        <div class="col-2">
                                                            <button type="button" v-if="options.title2.length > 1" @click="options.title2.length == 1 ? false : options.title2.splice(key, 1)" class="btn btn-block btn-warning">Loại bỏ</button>
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>
                                            <div class="col-10 mt-5">
                                                <button @click="options.title2.push({ name: '' })" type="button" class="btn btn-block btn-outline-secondary">Thêm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row pb-5">
                                    <label for="video" class="col-2 col-form-label">Chức năng gói sản phẩm</label>
                                    <div class="col-10">
                                        <template v-for="(items, id) in options.desc">
                                            <div class="row" :key="id">
                                                <div class="col-8 mt-5">
                                                    <div class="image-input image-input-empty image-input-outline background-position-center" :style="`background-image: url('${items.avatar ? items.avatar : '/img/avatar.png'}')`">
                                                        <div class="image-input-wrapper"></div>
                                                        <label @click="setTypeImage('option_avatar_1'), option_avatar_key = id" data-toggle="modal" data-target="#filemanager" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change">
                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                        </label>
                                                        <span v-if="items.avatar" @click="items.avatar = ''" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow d-flex" data-action="remove">
                                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="mt-5">
                                                        <button type="button" v-if="options.desc.length > 1" @click="options.desc.length == 1 ? false : options.desc.splice(id, 1)" class="btn btn-block btn-danger">Loại bỏ</button>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <template v-for="(item, key) in items.name">
                                                        <div class="row mt-5" :key="key">
                                                            <div class="col-10">
                                                                <input v-model="item.name" placeholder="Tiêu đề" class="form-control" type="text" />
                                                            </div>
                                                            <div class="col-2">
                                                                <button type="button" v-if="items.name.length > 1" @click="items.name.length == 1 ? false : items.name.splice(key, 1)" class="btn btn-block btn-warning">Loại bỏ</button>
                                                            </div>
                                                        </div>
                                                    </template>
                                                </div>
                                                <div class="col-10 mt-5">
                                                    <button @click="items.name.push({ name: '' })" type="button" class="btn btn-block btn-outline-secondary">Thêm</button>
                                                </div>

                                                <div class="col-12">
                                                    <template v-for="(item, key) in items.desc">
                                                        <div class="row mt-5" :key="key">
                                                            <div class="col-10">
                                                                <input v-model="item.name" placeholder="Mô tả" class="form-control" type="text" />
                                                            </div>
                                                            <div class="col-2">
                                                                <button type="button" v-if="items.desc.length > 1" @click="items.desc.length == 1 ? false : items.desc.splice(key, 1)" class="btn btn-block btn-warning">Loại bỏ</button>
                                                            </div>
                                                        </div>
                                                    </template>
                                                </div>
                                                <div class="col-10 mt-5">
                                                    <button @click="items.desc.push({ name: '' })" type="button" class="btn btn-block btn-outline-secondary">Thêm</button>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                                <div class="form-group row pb-5">
                                    <div class="col-2"></div>
                                    <div class="col-8">
                                        <button @click="options.desc.push({ avatar: '', name: [{ name: '' }], desc: [{ name: '' }] })" type="button" class="btn btn-block btn-secondary">Thêm</button>
                                    </div>
                                </div>
                                <div class="form-group row pb-5">
                                    <label for="video" class="col-2 col-form-label">Ứng dụng gói sản phẩm</label>
                                    <div class="col-10">
                                        <div class="row">
                                            <div class="col-12 mt-5">
                                                <input v-model="options.desc2.name" placeholder="Tiêu đề" class="form-control" type="text" />
                                            </div>
                                            <div class="col-12">
                                                <template v-for="(item, key) in options.desc2.items">
                                                    <div class="row mt-5" :key="key">
                                                        <div class="col-2">
                                                            <div class="image-input image-input-empty image-input-outline background-position-center" :style="`background-image: url('${item.avatar ? item.avatar : '/img/avatar.png'}')`">
                                                                <div class="image-input-wrapper"></div>
                                                                <label @click="setTypeImage('option_avatar'), option_avatar_key = key" data-toggle="modal" data-target="#filemanager" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change">
                                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                                </label>
                                                                <span v-if="item.avatar" @click="item.avatar = ''" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow d-flex" data-action="remove">
                                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-8">
                                                            <input v-model="item.name" placeholder="Mô tả" class="form-control" type="text" />
                                                        </div>
                                                        <div class="col-2">
                                                            <button type="button" v-if="options.desc2.items.length > 1" @click="options.desc2.items.length == 1 ? false : options.desc2.items.splice(key, 1)" class="btn btn-block btn-warning">Loại bỏ</button>
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>
                                            <div class="col-10 mt-5">
                                                <button @click="options.desc2.items.push({ name: '', avatar: '' })" type="button" class="btn btn-block btn-outline-secondary">Thêm</button>
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
    <div class="modal fade" id="filemanager">
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

localStorage.setItem('typeimage', 'image');
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
            options: {
                title: [
                    {
                        name: ""
                    }
                ],
                title2: [
                    {
                        name: ""
                    }
                ],
                desc2: {
                    name: "",
                    items: [
                        {
                            avatar: "",
                            name: ""
                        }
                    ]
                },
                desc: [
                    {
                        avatar: "",
                        name: [
                            {
                                name: ""
                            }
                        ],
                        desc: [
                            {
                                name: ""
                            }
                        ]
                    }
                ]
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
            id: '',
            image: '',
            name: '',
            slug: '',
            price_origin: '',
            price: '',
            description: '',
            content: '',
            sort: 0,
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
            this.sort = res.data.data.sort

            if (res.data.data.options) {
                this.options = res.data.data.options
            }

            KTUtil.ready(function () {
                var HelloButton = function (context) {
                    var ui = $.summernote.ui;
                    var button = ui.button({
                        contents: '<i class="fa far fa-folder"/>',
                        tooltip: 'Folder',
                        click: function () {
                            localStorage.setItem('typeimage', 'summernote');
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
        setTypeImage(type) {
            localStorage.setItem('typeimage', type);
        },
        setUrl(path) {
            let typeimage = localStorage.getItem("typeimage");
            $('#filemanager').modal('hide');
            if (typeimage == 'summernote') {
                var image = $('<img>').attr('src', path);
                $('.summernote').summernote("insertNode", image[0]);
            }
            else if (typeimage == 'option_avatar') {
                this.options.desc2.items[this.option_avatar_key].avatar = path
            }
            else if (typeimage == 'option_avatar_1') {
                this.options.desc[this.option_avatar_key].avatar = path
            }
            else {
                this.image = path
            }
        },
        async submit(status) {
            let params = {
                sort: this.sort,
                name: this.name,
                slug: this.slug,
                price_origin: this.price_origin,
                price: this.price,
                image: this.image,
                promotion: this.promotion,
                options: this.options,
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

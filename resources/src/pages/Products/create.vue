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
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_4">
                                    <span class="nav-icon"><i class="flaticon2-sheet"></i></span>
                                    <h3 class="card-title">Khuyễn mãi</h3>
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
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="kt_tab_pane_1_4" role="tabpanel" aria-labelledby="kt_tab_pane_1_4">
                                    <div class="form-group row">
                                        <label for="name" class="col-2 col-form-label">Tên</label>
                                        <div class="col-10">
                                            <input v-model="name" class="form-control" type="text" placeholder="Tên Sản phẩm" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="slug" class="col-2 col-form-label">URL</label>
                                        <div class="col-10">
                                            <input v-model="slug" class="form-control" type="search" placeholder="Đường dấn" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="price" class="col-2 col-form-label">Giá bán</label>
                                        <div class="col-10">
                                            <input v-model="price" class="form-control" type="number" placeholder="Giá bán" />
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kt_tab_pane_2_4" role="tabpanel" aria-labelledby="kt_tab_pane_2_4">
                                    <div class="form-group row pb-5" v-for="(items, i) in attributes" :key="i"  style="border-bottom: 1px solid #e4e6ef;">
                                        <label for="video" class="col-2 col-form-label">Tiêu đề {{i + 1}}</label>
                                        <div class="col-10">
                                            <div class="row">
                                                <div class="col-12 mt-3">
                                                    <input v-model="items.title" placeholder="Tiêu đề" class="form-control" type="text" />
                                                </div>
                                                <div class="col-12">
                                                    <template v-for="(item, key) in items.options">
                                                        <div class="row mt-5" :key="key">
                                                            <div class="col-5">
                                                                <input v-model="item.key" placeholder="key" class="form-control" type="text" />
                                                            </div>
                                                            <div class="col-5">
                                                                <input v-model="item.val" placeholder="value" class="form-control" type="text" />
                                                            </div>
                                                            <div class="col-2">
                                                                <button type="button" @click="items.options.length == 1 ? attributes.splice(i, 1) : items.options.splice(key, 1)" class="btn btn-block btn-warning">Loại bỏ</button>
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
                                    <button @click="attributes.push({title: '',options: [{ key: '', val: '', }] })" type="button" class="btn btn-block btn-outline-secondary">Thêm</button>
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
                    </form>
                </div>
                <div class="card-footer text-center">
                    <router-link to="/admin/san-pham/danh-sach" type="reset" class="btn btn-light-primary mr-1 font-weight-bolder"><i class="icon-sm ki ki-long-arrow-back"></i> Quay Lại</router-link>
                    <button type="reset" @click="submit(1)" class="btn btn-primary mr-1"><i class="icon-sm ki ki-bold-check-1   "></i> Lưu Sản phẩm</button>
                    <button type="reset" @click="submit(0)" class="btn btn-primary mr-1"><i class="icon-sm ki ki-info"></i> Lưu Ẩn</button>
                </div>
            </div>
        </div>
    </div>

</div>
</template>

<script>
import Extends from '../../extend';
import Breadcrumb from '../../components/breadcrumb/index'
import moment from 'moment'

export default {
    components: { Breadcrumb },
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
            attributes: [
                {
                    title: '',
                    options: [
                        {
                            key: '',
                            val: '',
                        }
                    ]
                }
            ],
            images: [],
            name: '',
            slug: '',
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
        this.getApiKM()
        axios('/api/categories?type=product').then(res => {
            this.categories = res.data.data
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
            });
        })
    },
    methods: {
        Text(text, length) {
            return Extends.FormatText(text, length)
        },
        formatPrice(price) {
            return Extends.formartPrice(price)
        },
        formatTime(time) {
            return moment(time).format('DD/MM/YYYY');
        },
        formatHuors(time) {
            return moment(time).format('hh:mm:ss');
        },
        async submit(status) {
            let listId = [];
            this.suggestion.forEach(item => {
                listId.push(item.id)
            });
            if (await this.errors() && this.checkImage()) {
                let params = {
                    suggestion_id: listId,
                    promotion_id: this.promotion_id ? this.promotion_id : 0,
                    name: this.name,
                    slug: this.slug,
                    number: this.number,
                    price: this.price,
                    video: this.video,
                    seo_title: this.seo_title,
                    seo_description: this.seo_description,
                    seo_keyword: this.seo_keyword,
                    category_id: this.category,
                    avatar: this.images[0].url,
                    images: this.images,
                    attributes: this.attributes,
                    description: this.description,
                    content: $('.summernote').summernote('code'),
                    status: String(status)
                }
                KTApp.blockPage({
                    overlayColor: "#000000",
                    state: "primary",
                    message: "Đợi Xíu...",
                })
                axios.post('/api/products', params).then((res) => {
                    KTApp.unblockPage();
                    toastr.success("Tạo Sản phẩm thành công!")
                    this.$router.push('/admin/san-pham/danh-sach');
                })
            } else {
                toastr.success("From thông tin chung (bắt buộc)!")
            }
        },
    },
}
</script>

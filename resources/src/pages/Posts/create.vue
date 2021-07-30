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
                                    <label for="categories" class="col-2 col-form-label">Loại bài viết</label>
                                    <div class="col-10">
                                        <select v-model="type" class="form-control" style="height: 35px">
                                            <option value="post">Tin tức</option>
                                            <option value="story">Câu truyện</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="keyword" class="col-2 col-form-label">Ảnh bài viết</label>
                                    <div class="col-10">
                                        <div class="image-input image-input-outline" id="kt_image_4" :style="`background-position: center; background-image: url('${avatar ? '' : '/img/blank.png'}');`">
                                            <div class="image-input-wrapper" :style="avatar ? { 'background-image': 'url(' + avatar + ')' } : ''"></div>
                                            <label v-if="!avatar" for="avatar" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                            </label>
                                            <span v-else @click="removeFiles" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                            <input @change="previewFiles" type="file" id="avatar" name="avatar" hidden>
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
                            <router-link to="/admin/bai-viet/danh-sach" type="reset" class="btn btn-light-primary mr-1 font-weight-bolder"><i class="icon-sm ki ki-long-arrow-back"></i> Quay Lại</router-link>
                            <button type="reset" @click="submit(1)" class="btn btn-primary mr-1"><i class="icon-sm ki ki-bold-check-1   "></i> Lưu Bài Viết</button>
                            <button type="reset" @click="submit(0)" class="btn btn-primary mr-1"><i class="icon-sm ki ki-info"></i> Lưu Ẩn</button>
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

export default {
    components: {
        Breadcrumb
    },
    data() {
        return {
            subHeader: {
                links: [{
                        name: 'Bài viết',
                        url: '/admin/bai-viet/danh-sach',
                    },
                    {
                        name: 'Thêm mới',
                        url: '/admin/bai-viet/them-moi',
                    },
                ],
                action: {
                    url: '/admin/bai-viet/danh-sach',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Danh Sách',
                }
            },
            name: '',
            author: '',
            slug: '',
            image: '',
            avatar: '',
            description: '',
            content: '',
            type: "post"
        }
    },
    watch: {
        name() {
            this.slug = Extends.ChangeToSlug(this.name)
        },
    },
    mounted() {
        KTUtil.ready(function () {
            $('.summernote').summernote({
                height: 350
            });
        });
    },
    methods: {
        previewFiles (event) {
            this.image = event.target.files[0];
            this.avatar = URL.createObjectURL(this.image);
        },
        removeFiles () {
            this.image = '';
            this.avatar = '';
        },
        async submit(status) {
            let params = new FormData();
            params.append('name', this.name);
            params.append('slug', this.slug);
            params.append('author', this.author);
            params.append('type', this.type);
            params.append('type', this.type);
            params.append('image', this.image);
            params.append('status', status);
            params.append('description', this.description);
            params.append('content', $('.summernote').summernote('code'));

            KTApp.blockPage({
                overlayColor: "#000000",
                state: "primary",
                message: "Đợi Xíu...",
            })
            axios.post('/api/posts', params).then((res) => {
                KTApp.unblockPage();
                this.$router.push('/admin/bai-viet/danh-sach');
            })
        }
    }
}
</script>

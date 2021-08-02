<template>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <Breadcrumb :data="subHeader" />
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">Thông tin chung</h3>
                </div>
                <div class="card-body">
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
                                        <input v-model="page_description" class="form-control" type="text" placeholder="Tên bài viết" />
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
                </div>
                <div class="card-footer text-center">
                    <router-link to="/admin/luan-giai/danh-sach" type="reset" class="btn btn-light-primary mr-1 font-weight-bolder"><i class="icon-sm ki ki-long-arrow-back"></i> Quay Lại</router-link>
                    <button type="reset" @click="submit()" class="btn btn-primary mr-1"><i class="icon-sm ki ki-bold-check-1"></i> Lưu luận giải</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
import Breadcrumb from '../../components/breadcrumb/index'

export default {
    components: { Breadcrumb },
    data() {
        return {
            subHeader: {
                links: [
                    {
                        name: 'luận giải',
                        url: '/admin/luan-giai/danh-sach',
                    },
                    {
                        name: 'Thêm mới',
                        url: '/admin/luan-giai/them-moi',
                    },
                ],
                action: {
                    url: '/admin/luan-giai/danh-sach',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Danh Sách',
                }
            },
            id: '',
            page_description: '',
        }
    },
    async mounted() {
        await axios('/api/thanso/' + this.$route.params.id).then(res => {
            this.id = res.data.data.id
            this.page_description = res.data.data.title
            KTUtil.ready(function () {
                $('.summernote').summernote({ height: 500 });
                $('.summernote').summernote('code', res.data.data.content)
            });
        })
    },
    methods: {
        async submit() {
            let params = {
                page_description: this.page_description,
                page_content: $('.summernote').summernote('code'),
            }
            KTApp.blockPage({
                overlayColor: "#000000",
                state: "primary",
                message: "Đợi Xíu...",
            })
            axios.put('/api/thanso/' + this.id, params).then((res) => {
                KTApp.unblockPage();
                toastr.success("Tạo luận giải thành công!")
                this.$router.push('/admin/luan-giai/danh-sach');
            })
        },
    },
}
</script>

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
                                        <input v-model="page_description" class="form-control" type="text" placeholder="Tên luận giải" />
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
    <div class="modal fade" id="filemanager">
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
import Breadcrumb from '../../components/breadcrumb/index'
import FileManage from '../../components/FileManager/index'
var typeimage = 'avatar';

export default {
    components: {
        Breadcrumb, FileManage
    },
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
                    height: 500,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear', 'italic', 'strikethrough', 'superscript', 'subscript']],
                        ['fontname', ['fontname']],
                        ['fontsize', ['fontsize']],
                        ['fontsizeunit', ['fontsizeunit']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
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

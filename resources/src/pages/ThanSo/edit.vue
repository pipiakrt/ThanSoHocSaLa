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

                            <div v-show="code.includes('CS-DD')">
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Tiêu đề</label>
                                    <div class="col-10">
                                        <input v-model="custom_title" class="form-control" type="text" placeholder="Tiêu đề" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Mô tả</label>
                                    <div class="col-10">
                                        <input v-model="custom_desc" class="form-control" type="text" placeholder="Mô tả" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="kt_summernote_2" class="col-2 col-form-label">Nội dung</label>
                                    <div class="col-10">
                                        <div class="summernote" id="kt_summernote_2"></div>
                                    </div>
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
                    <router-link to="/sala-backend/luan-giai/danh-sach" type="reset" class="btn btn-light-primary mr-1 font-weight-bolder"><i class="icon-sm ki ki-long-arrow-back"></i> Quay Lại</router-link>
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
                        url: '/sala-backend/luan-giai/danh-sach',
                    },
                    {
                        name: 'Thêm mới',
                        url: '/sala-backend/luan-giai/them-moi',
                    },
                ],
                action: {
                    url: '/sala-backend/luan-giai/danh-sach',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Danh Sách',
                }
            },
            id: '',
            page_description: '',
            code: '',
            custom_title: '',
            custom_desc: '',
        }
    },
    async created() {
        await axios('/api/thanso/' + this.$route.params.id).then(res => {
            this.id = res.data.data.id
            this.page_description = res.data.data.title
            this.code = res.data.data.code;
            if (res.data.data.custom) {
                this.custom_title = res.data.data.custom.title;
                this.custom_desc = res.data.data.custom.desc;
            }
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
                $('#kt_summernote_1').summernote({
                    height: 500,
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
                                $('#kt_summernote_1').summernote("insertNode", image[0]);
                            })
                        },
                    },
                });
                $('#kt_summernote_1').summernote('code', res.data.data.content)
                $('#kt_summernote_2').summernote({
                    height: 500,
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
                                $('#kt_summernote_2').summernote("insertNode", image[0]);
                            })
                        },
                    },
                });
                if (res.data.data.custom) {
                    if (res.data.data.custom.content) {
                        $('#kt_summernote_2').summernote('code', res.data.data.custom.content)
                    }
                }
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
                $('#kt_summernote_1').summernote("insertNode", image[0]);
            }
            else {
                this.avatar = path
            }
        },
        async submit() {
            let params = {
                page_description: this.page_description,
                custom: {
                    title: this.custom_title,
                    desc: this.custom_desc,
                    content: $('#kt_summernote_2').summernote('code'),
                },
                page_content: $('#kt_summernote_1').summernote('code'),
            }
            KTApp.blockPage({
                overlayColor: "#000000",
                state: "primary",
                message: "Đợi Xíu...",
            })
            axios.put('/api/thanso/' + this.id, params).then((res) => {
                KTApp.unblockPage();
                toastr.success("Tạo luận giải thành công!")
                this.$router.push('/sala-backend/luan-giai/danh-sach');
            })
        },
    },
}
</script>

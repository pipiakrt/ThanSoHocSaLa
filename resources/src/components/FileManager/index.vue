<style scoped>
    .form-upload {
        display: flex;
        min-height: 400px;
        align-items: center;
    }
</style>
<template>
<div class="flex-row-fluid d-flex flex-column ml-lg-12">
    <div class="d-flex flex-column flex-grow-1">
        <div class="card card-custom gutter-b">
            <div class="card-body d-flex align-items-center justify-content-between flex-wrap py-3">
                <div class="d-flex align-items-center mr-2 py-2">
                    <h3 v-if="!dir" class="font-weight-bold mb-0 mr-10">Tệp Tin</h3>
                    <a v-else v-for="(action, i) in test" @click="dir = action.url" :key="i" class="btn btn-light font-weight-bolder btn-sm mr-2">
                        <i v-if="action.name" class="icon-sm ki ki-long-arrow-back"></i>
                        {{ action.name }}
                    </a>
                </div>
                <div class="symbol-group symbol-hover py-2">
                    <div class="card-toolbar">
                        <div class="dropdown dropdown-inline">
                            <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ki ki-bold-more-hor"></i>
                            </a>
                            <a v-if="getUrl" @click="returnUrl()" class="btn btn-light font-weight-bolder btn-sm">
                                <i class="icon-sm ki ki-bold-close"></i>
                                Đóng
                            </a>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                <ul class="navi navi-hover">
                                    <li class="navi-header font-weight-bold py-4">
                                        <span class="font-size-lg">Chức năng</span>
                                        <i class="ki ki-menu"></i>
                                    </li>
                                    <li class="navi-separator mb-3 opacity-70"></li>
                                    <li class="navi-item">
                                        <a data-toggle="modal" data-target="#exampleModalLong1" class="navi-link">
                                            <i class="fa far text-warning fa-folder mr-5"></i>
                                            <span class="navi-text">Thêm folder</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <label for="upload-file" class="navi-link">
                                            <i class="fa far text-warning fa-file-image mr-6"></i>
                                            <span class="navi-text">Thêm tệp tin</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal-->
        <div class="modal fade" id="exampleModalLong1" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Thêm Folder</h3>
                            <button @click="hideModal()" type="button" class="close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <form>
                            <ValidationObserver ref="errors">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="name" class="col-3 col-form-label">Tên</label>
                                        <div class="col-9">
                                            <validation-provider rules="required" v-slot="{ errors }">
                                                <input v-model="foldel" class="form-control" type="text" placeholder="Tên folder" id="name" />
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                </div>
                            </ValidationObserver>
                        </form>
                        <div class="card-footer">
                            <button @click="createFolder()" type="reset" class="btn btn-sm btn-primary mr-2">Thêm Fooder</button>
                            <button @click="hideModal()" class="btn btn-sm btn-secondary">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div v-for="(image, i) in images" :key="i" class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="card card-custom gutter-b card-stretch">
                    <div class="card-header border-0">
                        <h3 class="card-title"></h3>
                        <div class="card-toolbar">
                            <div class="dropdown dropdown-inline">
                                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ki ki-bold-more-hor"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-center">
                                    <ul v-if="image.type == 'dir'" class="navi navi-hover py-5">
                                        <li class="navi-item">
                                            <a @click="destroyDirectory(image.path)" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="fa far fa-trash-alt"></i>
                                                </span>
                                                <span class="navi-text">Xóa</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul v-else class="navi navi-hover py-5">
                                        <li v-if="getUrl" class="navi-item">
                                            <a @click="returnUrl(image.path)" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="fa la-check"></i>
                                                </span>
                                                <span class="navi-text">Chọn ảnh</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a :href="domain + image.path" target="_blank" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="fas fa-external-link-alt"></i>
                                                </span>
                                                <span class="navi-text">Preview</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a @click="Clipboard(domain + image.path)" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="fas fa-link"></i>
                                                </span>
                                                <span class="navi-text">Coppy liên kết</span>
                                            </a>
                                        </li>
                                        <li v-if="!getUrl" class="navi-item">
                                            <a :href="'/api/images/download?path=' + image.path" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="fas fa-file-download"></i>
                                                </span>
                                                <span class="navi-text">Tải về</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a @click="destroyFile(image.path)" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="fa far fa-trash-alt"></i>
                                                </span>
                                                <span class="navi-text">Xóa</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center overflow-hidden">
                            <span @click="dir = image.path" v-if="image.type == 'dir'">
                                <i class="fa far text-warning fa-folder icon-5x"></i>
                            </span>
                            <img v-else class="max-h-65px" :src="domain + image.path" />
                            <a href="#" class="text-dark-75 font-weight-bold mt-15 font-size-lg" v-text="image.basename"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input @change="upLoads()" hidden type="file" ref="file" id="upload-file" multiple="multiple" accept="image/png, image/jpeg">
    </div>
</div>
</template>

<script>
import Extends from '../../extend';
import {
    ValidationObserver,
    ValidationProvider,
    extend
} from 'vee-validate';
import {
    required
} from 'vee-validate/dist/rules';
extend('required', {
    ...required,
    message: 'Không được để trống'
});
export default {
    components: {
        ValidationProvider,
        ValidationObserver
    },
    props: ["getUrl"],
    data() {
        return {
            domain: 'https://cdn.sieuthitamlinhsala.vn/',
            images: [],
            dir: '',
            foldel: '',
            test: []
        }
    },
    watch: {
        dir() {
            this.getApi()
            let combinedArr = [
                {
                    name: 'Quay lại',
                    url: '',
                }
            ];
            let listAction = [];
            let temp = '';
            let action = this.dir.split('/');
            action.forEach(url => {
                if (temp) {
                    temp = temp + '/' + url
                }
                else {
                    temp = url
                }
                listAction.push(temp)
            });
            for (let i = 0; i < action.length; i++) {
                let item = {
                    name: action[i],
                    url: listAction[i],
                }
                combinedArr.push(item)
            }
            this.test = combinedArr.splice(0, combinedArr.length-1);
        }
    },
    created() {
        this.getApi()
    },
    methods: {
        upLoads() {
            Extends.LoadPage()
            let files = this.$refs.file.files
            const formData = new FormData();
            formData.append('dir', this.dir);
            files.forEach((item) => {
                formData.append('file[]', item);
            });
            axios.post('/api/images', formData).then(res => {
                this.getApi()
                this.$refs.file.value=null;
            })
        },
        async getApi() {
            Extends.LoadPage()
            await axios('/api/images?dir=' + this.dir).then(res => {
                this.images = res.data
                KTApp.unblockPage();
            })
        },
        hideModal() {
            $('#exampleModalLong1').modal('hide')
            $('#exampleModalLongUpdload').modal('hide')
        },
        returnUrl(path = false) {
            if (path) {
                this.$emit("url", this.domain + path);
            } else {
                this.$emit("url", '');
            }
        },
        createFolder() {
            if (this.errors()) {
                Extends.LoadPage()
                if (this.foldel[0] == ' ') {
                    this.foldel = ''.concat('_', this.foldel);
                }
                let params = {
                    directory: this.dir + '/' + this.foldel
                }
                axios.post('/api/images', params).then((res) => {
                    if (res.status == 200) {
                        this.getApi()
                        this.hideModal()
                        this.foldel = ''
                        this.$refs['errors'].reset();
                    } 
                    else 
                    {
                        Swal.fire("Rất Tiếc!", "Đã có sự cố đã sảy ra, vui lòng thử lại sau!", "error");
                    }
                })
            }
        },
        destroyFile(path) {
            let request = {
                path: path
            }
            Extends.LoadPage()
            axios.delete('/api/images/destroy', {
                params: request
            }).then(res => {
                this.images = this.images.filter(image => image.path != path);
                KTApp.unblockPage();
                toastr.success("Đã Xóa")
            })
        },
        destroyDirectory(dir) {
            Extends.LoadPage()
            let request = { dir: dir }
            axios.delete('/api/images/destroy', { params: request }).then(res => {
                this.images = this.images.filter(image => image.path != dir);
                KTApp.unblockPage();
                toastr.success("Đã Xóa Thư Mục")
            })
        },
        Clipboard(path) {
            Extends.Clipboard_CopyTo(path)
            toastr.success("Đã Coppy đường dẫn")
        },
        errors() {
            return this.$refs['errors'].validate();
        },
    },
}
</script>
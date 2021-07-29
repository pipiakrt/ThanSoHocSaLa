<style scoped>
    .modal-dialog{
        overflow-y: initial !important
    }
    .modal-body{
        max-height: calc(100vh - 200px);
        overflow-y: auto;
    }
</style>
<template>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <Breadcrumb :data="subHeader" />
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-custom">
                        <div class="card-header flex-wrap border-0 pb-0">
                            <div class="card-title">
                                <h3 class="card-label">Menu</h3>
                            </div>
                            <div class="symbol-group symbol-hover py-2">
                                <div class="card-toolbar">
                                    <div class="dropdown dropdown-inline">
                                        <button data-toggle="modal" data-target="#exampleModalLong" class="btn btn-primary mr-2" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-sm ki ki-plus"></i> Thêm Mới
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0" id="loadTag">
                            <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                <thead>
                                    <tr class="text-uppercase">
                                        <th style="width: 50px">ID</th>
                                        <th style="width: 100px">Ảnh</th>
                                        <th style="min-width: 100px">Tên</th>
                                        <th style="min-width: 120px">URL</th>
                                        <th class="text-center">EXT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-for="item in menus">
                                        <tr :key="item.id">
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="item.id"></span>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                    <img class="w-100" :src="item.image">
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="item.name"></span>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="item.link"></span>
                                            </td>
                                            <td class="text-center">
                                                <div class="dropdown dropdown-inline">
                                                    <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ki ki-bold-more-hor"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                        <ul class="navi navi-hover">
                                                            <li class="navi-item">
                                                                <a @click="destroy(item.id)" class="navi-link">
                                                                    <span class="navi-icon">
                                                                        <i class="flaticon2 flaticon2-trash"></i>
                                                                    </span>
                                                                    <span class="navi-text">Xóa Menu</span>
                                                                </a>
                                                                <a @click="name = item.name, link = item.link, id = item.id, avatar = item.image, attributes = item.attributes" class="navi-link" data-toggle="modal" data-target="#exampleModalLong">
                                                                    <span class="navi-icon">
                                                                        <i class="fa fas fa-edit"></i>
                                                                    </span>
                                                                    <span class="navi-text">Chỉnh sửa</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal-->
    <div class="modal fade" id="exampleModalLong" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm Mới</h5>
                    <button @click="formatData()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-custom gutter-b example example-compact">
                        <form>
                            <ValidationObserver ref="errors">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="name" class="col-2 col-form-label">Menu</label>
                                        <div class="col-10">
                                            <validation-provider rules="required|length:0,255" v-slot="{ errors }">
                                                <input v-model="name" class="form-control" type="text" placeholder="Tên Menu" />
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-2 col-form-label">Link</label>
                                        <div class="col-10">
                                            <validation-provider rules="required|length:0,255" v-slot="{ errors }">
                                                <input v-model="link" class="form-control" type="text" placeholder="link" />
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="slug" class="col-2 col-form-label">Ảnh</label>
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
                                                                <input v-model="item.key" placeholder="Name" class="form-control" type="text" />
                                                            </div>
                                                            <div class="col-5">
                                                                <input v-model="item.val" placeholder="Link" class="form-control" type="text" />
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
                            </ValidationObserver>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button @click="formatData()" type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Đóng</button>
                    <button type="button" @click="submit()" class="btn btn-primary font-weight-bold" v-text="id ? 'Cập nhật' : 'Thêm mới'"></button>
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
import Breadcrumb from '../../components/breadcrumb/index'
import FileManage from '../../components/FileManager/index'
import { ValidationObserver, ValidationProvider, extend } from 'vee-validate';
import { required } from 'vee-validate/dist/rules';
extend('required', { ...required, message: 'Không được để trống' });
export default {
    components: { Breadcrumb, FileManage, ValidationProvider, ValidationObserver },
    data() {
        return {
            subHeader: {
                links: [{
                    name: 'Menu',
                    url: '/menu/danh-muc',
                }, ],
                action: {
                    url: '/',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Dashboard',
                }
            },
            id: '',
            menus: [],
            avatar: '',
            name: '',
            link: '',
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
            modal: false
        }
    },
    created() {
        this.getApi()
    },
    methods: {
        setUrl(path) {
            $('#filemanager').modal('hide');
            this.avatar = path
        },
        getApi() {
            KTApp.block('#loadTag', {
                message: 'Đợi chút...'
            });
            axios('/api/menus?type=category').then(res => {
                KTApp.unblock('#loadTag');
                this.menus = res.data.data
            })
        },
        async submit() {
            if (await this.errors()) {
                let params = {
                    type: 'category',
                    name: this.name,
                    image: this.avatar,
                    link: this.link,
                    attributes: this.attributes
                }
                KTApp.blockPage({
                    overlayColor: "#000000",
                    state: "primary",
                    message: "Đợi Xíu...",
                })
                if (this.id) {
                    axios.put('/api/menus/' + this.id, params).then((res) => {
                        this.formatData()
                        this.getApi()
                        toastr.success("Thành công!")
                    })
                }
                else {
                    axios.post('/api/menus', params).then((res) => {
                        this.formatData()
                        this.getApi()
                        toastr.success("Thành công!")
                    })
                }
                KTApp.unblockPage();
                $('#exampleModalLong').modal('hide')
            }
        },
        formatData() {
            this.id = ''
            this.name = ''
            this.avatar = ''
            this.link = ''
            this.attributes = [
                {
                    title: '',
                    options: [
                        {
                            key: '',
                            val: '',
                        }
                    ]
                }
            ]
            this.$refs['errors'].reset();
        },
        async errors() {
            return await this.$refs['errors'].validate();
        },
        destroy(id) {
            axios.delete('/api/menus/' + id).then(res => {
                Swal.fire(
                    "Thành Công!",
                    "Menu đã bị xóa hoàn toàn.",
                    "success"
                )
                this.menus = this.menus.filter(item => item.id !== id)
            })
        },
    },
}
</script>

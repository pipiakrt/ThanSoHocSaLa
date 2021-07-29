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
                                <h3 class="card-label">Danh mục</h3>
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
                                        <th style="min-width: 120px">Tên</th>
                                        <th style="min-width: 120px">link</th>
                                        <th class="text-center">EXT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-for="item in banners">
                                        <tr :key="'row' + item.id">
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="item.id"></span>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                    <img class="w-100" :src="item.url">
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
                                                                    <span class="navi-text">Xóa</span>
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
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm Mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-custom gutter-b example example-compact">
                        <form>
                            <ValidationObserver ref="errors">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="name" class="col-2 col-form-label">Tên</label>
                                        <div class="col-10">
                                            <validation-provider rules="required|length:0,255" v-slot="{ errors }">
                                                <input v-model="name" class="form-control" type="text" placeholder="Địa chỉ liên kết" />
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-2 col-form-label">Link</label>
                                        <div class="col-10">
                                            <validation-provider rules="required|length:0,255" v-slot="{ errors }">
                                                <input v-model="link" class="form-control" type="text" placeholder="Địa chỉ liên kết" />
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="slug" class="col-2 col-form-label">Ảnh</label>
                                        <div class="col-10">
                                            <div class="image-input image-input-empty image-input-outline background-position-center" :style="`background-image: url('${avatar ? avatar : '/img/avatar.png'}')`">
                                                <div class="image-input-wrapper" :style="avatar ? 'width: 325px' : ''"></div>
                                                <label @click="modal = true" data-toggle="modal" data-target="#filemanager" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                </label>
                                                <span v-if="avatar" @click="avatar = ''" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow d-flex" data-action="remove">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </ValidationObserver>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Đóng</button>
                    <button type="button" @click="submit()" class="btn btn-primary font-weight-bold">Thêm mới</button>
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
import FileManage from '../../components/FileManager/index'
import Breadcrumb from '../../components/breadcrumb/index'
import {
    ValidationObserver,
    ValidationProvider,
    extend
} from 'vee-validate';
import {
    required
} from 'vee-validate/dist/rules';
toastr.options = {
    "progressBar": true,
    "positionClass": "toast-top-right"
};
extend('required', {
    ...required,
    message: 'Không được để trống'
});
extend('length', {
    validate(value, {
        min,
        max
    }) {
        return value.length >= min && value.length <= max;
    },
    params: ['min', 'max'],
    message: 'Độ dài không hợp lệ'
});
var typeimage = 'create';
export default {
    components: {
        Breadcrumb,
        FileManage,
        ValidationProvider,
        ValidationObserver
    },
    data() {
        return {
            subHeader: {
                links: [{
                    name: 'Danh mục',
                    url: '/tin-tuc/danh-muc',
                }, ],
                action: {
                    url: '/',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Dashboard',
                }
            },
            name: '',
            link: '',
            banners: [],
            avatar: '',
            modal: false
        }
    },
    mounted() {
        KTApp.block('#loadTag', {
            message: 'Đợi chút...'
        });
        axios('/api/banners').then(res => {
            KTApp.unblock('#loadTag');
            this.banners = res.data.data
        })
    },
    methods: {
        setUrl(path) {
            $('#filemanager').modal('hide');
            if (typeimage == 'create') {
                this.avatar = path
            } else {
                this.images[typeimage].url = path
            }
        },
        async submit() {
            if (await this.errors()) {
                let params = {
                    link: this.link,
                    name: this.name,
                    path: this.avatar,
                }
                KTApp.blockPage({
                    overlayColor: "#000000",
                    state: "primary",
                    message: "Đợi Xíu...",
                })
                axios.post('/api/banners', params).then((res) => {
                    KTApp.unblockPage();
                    if (res.status == 201) {
                        this.link = ''
                        this.name = ''
                        this.avatar = ''
                        params.id = res.data._id
                        params.url = params.path
                        this.banners.push(params)
                        this.$refs['errors'].reset();
                        toastr.success("Tạo danh mục thành công!")
                        $('#exampleModalLong').modal('hide')
                    } else {
                        if (res.data.name) {
                            toastr.warning(res.data.name);
                        }
                    }
                })
            }
        },
        async errors() {
            return await this.$refs['errors'].validate();
        },
        destroy(id) {
            axios.delete('/api/banners/' + id).then(res => {
                Swal.fire(
                    "Thành Công!",
                    "Danh mục đã bị xóa hoàn toàn.",
                    "success"
                )
                this.banners = this.banners.filter(item => item.id !== id)
            })
        },
    },
}
</script>

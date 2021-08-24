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
                                <h3 class="card-label">Chuyên mục</h3>
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
                                        <th>Tên</th>
                                        <th style="max-width: 100px" class="text-right">EXT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="item in chuyenmuc" :key="'row' + item.id">
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="item.name"></span>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-inline">
                                                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ki ki-bold-more-hor"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                    <ul class="navi navi-hover">
                                                        <li class="navi-item">
                                                            <a @click="nameUpdate = item.name, idUpdate = item.id" class="navi-link" data-toggle="modal" data-target="#exampleModalLongUpdate">
                                                                <span class="navi-icon">
                                                                    <i class="fa fas fa-edit"></i>
                                                                </span>
                                                                <span class="navi-text">Chỉnh sửa</span>
                                                            </a>
                                                            <a @click="destroy(item.id)" class="navi-link">
                                                                <span class="navi-icon">
                                                                    <i class="flaticon2 flaticon2-trash"></i>
                                                                </span>
                                                                <span class="navi-text">Xóa Chuyên mục</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
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
                                                    <input v-model="name" class="form-control" type="text" placeholder="Tên Chuyên mục" />
                                                    <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                                </validation-provider>
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

    <!-- Modal-->
    <div class="modal fade" id="exampleModalLongUpdate" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cập Nhật</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="card card-custom gutter-b example example-compact">
                            <form>
                                <ValidationObserver ref="errorUpdate">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="name" class="col-2 col-form-label">Tên</label>
                                            <div class="col-10">
                                                <validation-provider rules="required|length:0,255" v-slot="{ errors }">
                                                    <input v-model="nameUpdate" class="form-control" type="text" placeholder="Tên Chuyên mục" />
                                                    <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                                </validation-provider>
                                            </div>
                                        </div>
                                    </div>
                                </ValidationObserver>
                            </form>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Đóng</button>
                    <button type="button" @click="update()" class="btn btn-primary font-weight-bold">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Breadcrumb from '../../components/breadcrumb/index'
import { ValidationObserver, ValidationProvider, extend } from 'vee-validate';
import { required } from 'vee-validate/dist/rules';
toastr.options = { "progressBar": true, "positionClass": "toast-top-right" };
extend('required', {
    ...required,
    message: 'Không được để trống'
});
extend('length', {
    validate(value, { min, max }) {
        return value.length >= min && value.length <= max;
    },
    params: ['min', 'max'],
    message: 'Độ dài không hợp lệ'
});

export default {
    components: { Breadcrumb, ValidationProvider, ValidationObserver },
    data() {
        return {
            subHeader: {
                links: [
                    {
                        name: 'Bài viết',
                        url: '/sala-backend/bai-viet/danh-sach',
                    },
                    {
                        name: 'Chuyên mục',
                        url: '/sala-backend/bai-viet/chuyen-muc',
                    },
                ],
                action: {
                    url: '/',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Dashboard',
                }
            },
            name: '',
            idUpdate: '',
            nameUpdate: '',
            chuyenmuc: []
        }
    },
    mounted() {
        KTApp.block('#loadTag', {
            message: 'Đợi chút...'
        });
        axios('/api/chuyenmuc').then(res => {
            KTApp.unblock('#loadTag');
            this.chuyenmuc = res.data.data
        })
    },
    methods: {
        async submit() {
            if (await this.errors()) {
                let params = {
                    name: this.name,
                }
                KTApp.blockPage({
                    overlayColor: "#000000",
                    state: "primary",
                    message: "Đợi Xíu...",
                })
                axios.post('/api/chuyenmuc', params).then((res) => {
                    KTApp.unblockPage();
                    if (res.status == 201) {
                        this.name = ''
                        params.id = res.data._id
                        this.chuyenmuc.push(params)
                        this.$refs['errors'].reset();
                        toastr.success("Tạo Chuyên mục thành công!")
                        $('#exampleModalLong').modal('hide')
                    }
                    else {
                        if (res.data.name) {
                            toastr.warning(res.data.name);
                        }
                    }
                })
            }
        },
        async update() {
            if (await this.errorUpdate()) {
                let params = {
                    name: this.nameUpdate,
                }
                KTApp.blockPage({
                    overlayColor: "#000000",
                    state: "primary",
                    message: "Đợi Xíu...",
                })
                axios.patch('/api/chuyenmuc/' + this.idUpdate, params).then((res) => {
                    KTApp.unblockPage();
                    let key = this.chuyenmuc.findIndex(item => item.id == this.idUpdate)
                    this.chuyenmuc[key].name = this.nameUpdate
                    $('#exampleModalLongUpdate').modal('hide')
                    toastr.success("Cập nhật thành công!")
                    this.$refs['errorupdate'].reset();
                })
            }
        },
        async errors() {
            return await this.$refs['errors'].validate();
        },
        async errorUpdate() {
            return await this.$refs['errorUpdate'].validate();
        },
        destroy(id) {
            axios.delete('/api/chuyenmuc/' + id).then(res => {
                Swal.fire(
                    "Thành Công!",
                    "Chuyên mục đã bị xóa hoàn toàn.",
                    "success"
                )
                this.chuyenmuc = this.chuyenmuc.filter(item => item.id !== id)
            })
        },
    },
}
</script>

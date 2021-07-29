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
                                        <th style="min-width: 100px">Tên</th>
                                        <th style="min-width: 120px">URL</th>
                                        <th class="text-center">EXT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-for="item in categoryhightlight">
                                        <tr :key="'row' + item.category.id">
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="item.category.id"></span>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                    <img class="w-100" :src="item.category.avatar">
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="item.category.name"></span>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="item.category.slug"></span>
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
                                                                    <span class="navi-text">Xóa danh mục</span>
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
                                        <label for="name" class="col-2 col-form-label">Danh mục</label>
                                        <div class="col-10">
                                            <validation-provider rules="required" v-slot="{ errors }">
                                                <select v-model="category_id" class="form-control">
                                                    <option value="" selected>Chọn danh mục</option>
                                                    <template v-for="item in categories">
                                                        <option :key="item.id" :value="item.id" v-text="item.name"></option>
                                                    </template>
                                                </select>
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
</div>
</template>

<script>
import Extends from '../../extend';
import Breadcrumb from '../../components/breadcrumb/index'
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
var typeimage = 'create';
export default {
    components: {
        Breadcrumb,
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
            categoryhightlight: [],
            categories: [],
            category_id: '',
            modal: false
        }
    },
    watch: {
        name() {
            this.slug = Extends.ChangeToSlug(this.name)
        },
        nameUpdate() {
            this.slugUpdate = Extends.ChangeToSlug(this.nameUpdate)
        },
    },
    created() {
        KTApp.block('#loadTag', {
            message: 'Đợi chút...'
        });
        axios('/api/categoryhightlights').then(res => {
            KTApp.unblock('#loadTag');
            this.categoryhightlight = res.data.data
        })
        axios('/api/categories').then(res => {
            this.categories = res.data.data
        })
    },
    methods: {
        async submit() {
            if (await this.errors()) {
                let params = {
                    category_id: this.category_id,
                }
                KTApp.blockPage({
                    overlayColor: "#000000",
                    state: "primary",
                    message: "Đợi Xíu...",
                })
                axios.post('/api/categoryhightlights', params).then((res) => {
                    KTApp.unblockPage();
                    if (res.status == 201) {
                        params.id = res.data._id
                        params.category = this.categories.find(item => item.id == params.category_id)
                        this.categoryhightlight.push(params)
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
            axios.delete('/api/categoryhightlights/' + id).then(res => {
                Swal.fire(
                    "Thành Công!",
                    "Danh mục đã bị xóa hoàn toàn.",
                    "success"
                )
                this.categoryhightlight = this.categoryhightlight.filter(item => item.id !== id)
            })
        },
    },
}
</script>

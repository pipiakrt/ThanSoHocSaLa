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
                                <h3 class="card-label">bài viết</h3>
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
                                    <template v-for="item in posthot">
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
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="item.slug"></span>
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
                                                                    <span class="navi-text">Xóa bài viết</span>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-custom gutter-b example example-compact">
                        <div>
                            <ValidationObserver ref="errors">
                                <div class="card-body">
                                    <div class="row mb-5">
                                        <div class="col-10">
                                            <input v-model="filterName" type="text" placeholder="Tên bài viết" class="form-control form-control-sm form-filter datatable-input"/>
                                        </div>
                                        <div class="col-2">
                                            <button @click="getApi()" type="button" class="btn btn-block btn-primary kt-btn btn-sm kt-btn--icon d-block">Lọc SP</button>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                            <thead>
                                                <tr class="text-uppercase">
                                                    <th>
                                                        <span class="text-dark-75">bài viết</span>
                                                    </th>
                                                    <th class="text-center">Chọn</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="item in posts.data" :key="'row' + item.id">
                                                    <td class="pl-0 py-8">
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                                                <div class="symbol-label" :style="`background-image: url('${item.url}')`"></div>
                                                            </div>
                                                            <div>
                                                                <span class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg" v-text="item.name"></span>
                                                                <span class="text-muted d-block" v-text="item.slug"></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" @click="submit(item.id)" class="btn btn-primary btn-sm">Thêm</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </ValidationObserver>
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
        Breadcrumb,
        ValidationProvider,
        ValidationObserver
    },
    data() {
        return {
            subHeader: {
                links: [{
                    name: 'bài viết',
                    url: '/tin-tuc/danh-muc',
                }, ],
                action: {
                    url: '/',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Dashboard',
                }
            },
            posthot: [],
            posts: [],
            post_id: '',
            filterName: '',
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
        axios('/api/posthots').then(res => {
            KTApp.unblock('#loadTag');
            this.posthot = res.data.data
        })
        this.getApi()
    },
    methods: {
        async getApi() {
            Extends.LoadPage()
            let query = {
                name: this.filterName,
            }
            let posts = await axios("/api/posts", {
                params: query
            });
            this.posts = posts.data
            KTApp.unblockPage();
        },
        async submit(id) {
            if (await this.errors()) {
                let params = {
                    post_id: id,
                }
                KTApp.blockPage({
                    overlayColor: "#000000",
                    state: "primary",
                    message: "Đợi Xíu...",
                })
                axios.post('/api/posthots', params).then((res) => {
                    KTApp.unblockPage();
                    if (res.status == 201) {
                        params.id = res.data._id
                        params = this.posts.data.find(item => item.id == params.post_id)
                        this.posthot.push(params)
                        this.$refs['errors'].reset();
                        toastr.success("Tạo bài viết thành công!")
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
            axios.delete('/api/posthots/' + id).then(res => {
                Swal.fire(
                    "Thành Công!",
                    "bài viết đã bị xóa hoàn toàn.",
                    "success"
                )
                this.posthot = this.posthot.filter(item => item.id !== id)
            })
        },
    },
}
</script>

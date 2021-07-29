<template>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <Breadcrumb :data="subHeader" />
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">Danh sách bài viết</span>
                    </h3>
                    <div class="symbol-group symbol-hover">
                        <div class="card-toolbar">
                            <div class="dropdown dropdown-inline">
                                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ki ki-bold-more-hor"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <ul class="navi navi-hover">
                                        <li class="navi-item">
                                            <a @click="destroy()" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="flaticon2 flaticon2-trash"></i>
                                                </span>
                                                <span class="navi-text">Xóa đã chọn</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0 pb-3">
                    <div class="row mb-5">
                        <div class="col-3">
                            <input v-model="filterName" type="text" placeholder="Tên sản phẩm" class="form-control form-control-sm form-filter datatable-input"/>
                        </div>
                        <div class="col-3">
                            <select v-model="filterCategory" class="form-control form-control-sm form-filter datatable-input">
                                <option value="">Danh mục</option>
                                <template v-for="item in categories">
                                    <option :key="item.id" v-if="item.parent_id > 0" :value="item.id" v-text="item.name"></option>
                                </template>
                            </select>
                        </div>
                        <div class="col-5">
                            <div class="row">
                                <div class="col-6">
                                    <select v-model="filterOrder" class="form-control form-control-sm form-filter datatable-input" title="Select" data-col-index="6">
                                        <option value="">Sắp xếp</option>
                                        <option value="DESC">Mới nhất</option>
                                        <option value="ASC">Cũ nhất</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <select v-model="filterStatus" class="form-control form-control-sm form-filter datatable-input" title="Chọn" data-col-index="7">
                                        <option value="">Trạng thái</option>
                                        <option value="1">Hoạt Động</option>
                                        <option value="0">Tạm Ẩn</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <button @click="getApi()" class="btn btn-block btn-primary kt-btn btn-sm kt-btn--icon d-block">Lọc SP</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                            <thead>
                                <tr class="text-uppercase">
                                    <th style="min-width: 50px;">
                                        <label class="checkbox">
                                            <input v-model="checkAll" type="checkbox" />
                                            <span></span>
                                        </label>
                                    </th>
                                    <th style="min-width: 300px" class="pl-0">
                                        <span class="text-dark-75">Bài viết</span>
                                    </th>
                                    <th style="min-width: 100px">Mô tả</th>
                                    <th style="min-width: 120px">Ngày tạo</th>
                                    <th style="min-width: 120px">cập nhật</th>
                                    <th style="min-width: 100px">Trạng thái</th>
                                    <th class="text-center">EXT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in posts.data" :key="'row' + item.id">
                                    <td>
                                        <label class="checkbox">
                                            <input v-model="checkbox" :value="item.id" type="checkbox"/>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td class="pl-0 py-8">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                                <div class="symbol-label" :style="`background-image: url('${item.url}')`"></div>
                                            </div>
                                            <div>
                                                <router-link :to="'/bai-viet/' + item.id + '/chinh-sua'" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg" v-text="Text(item.name, 50)"></router-link>
                                                <span class="text-muted d-block" v-text="Text(item.slug, 50)"></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="Text(item.description, 250)"></span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="formatTime(item.created_at)"></span>
                                        <span class="text-muted font-weight-bold" v-text="formatHuors(item.created_at)"></span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="formatTime(item.updated_at)"></span>
                                        <span class="text-muted font-weight-bold" v-text="formatHuors(item.updated_at)"></span>
                                    </td>
                                    <td>
                                        <span class="switch switch-primary justify-content-center">
                                            <label>
                                                <input @change="changeStatus(item.id, item.status = !item.status)" type="checkbox" :checked="item.status" />
                                                <span></span>
                                            </label>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown dropdown-inline">
                                            <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ki ki-bold-more-hor"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                <ul class="navi navi-hover">
                                                    <li class="navi-item">
                                                        <a class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="fas fa-external-link-alt"></i>
                                                            </span>
                                                            <span class="navi-text">Tiến tới trang</span>
                                                        </a>
                                                        <router-link :to="'/bai-viet/' + item.id + '/chinh-sua'" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="fa fas fa-edit"></i>
                                                            </span>
                                                            <span class="navi-text">Chỉnh sửa</span>
                                                        </router-link>
                                                        <a @click="destroy([item.id])" class="navi-link">
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
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-body">
                    <paginate
                        :container-class="'phantrang'"
                        :prev-link-class="'btn btn-icon btn-sm border-0 btn-light mr-2 my-1'"
                        :next-link-class="'btn btn-icon btn-sm border-0 btn-light mr-2 my-1'"
                        :first-last-button="true"
                        :first-button-text="`<i class='ki ki-bold-double-arrow-back icon-xs'></i>`"
                        :last-button-text="`<i class='ki ki-bold-double-arrow-next icon-xs'></i>`"
                        :no-li-surround="true"
                        :page-count="posts.meta.last_page"
                        :page-range="3"
                        :click-handler="toPage"
                        :disabled-class="'disable'"
                        :active-class="'btn-hover-primary active'"
                        :prev-text="`<i class='ki ki-bold-arrow-back icon-xs'></i>`"
                        :next-text="`<i class='ki ki-bold-arrow-next icon-xs'></i>`"
                        :page-link-class="'btn btn-icon btn-sm border-0 btn-light mr-2 my-1'"
                    >
                    </paginate>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Extends from '../../extend';
import Paginate from 'vuejs-paginate'
import Breadcrumb from '../../components/breadcrumb/index'
import moment from 'moment'
export default {
    components: {
        Breadcrumb,
        Paginate
    },
    data() {
        return {
            subHeader: {
                links: [{
                        name: 'Bài viết',
                        url: '/bai-viet/danh-sach',
                    },
                    {
                        name: 'Danh sách',
                        url: '/bai-viet/danh-sach',
                    },
                ],
                action: {
                    url: '/bai-viet/them-moi',
                    icon: 'icon-sm ki ki-plus',
                    text: 'Thêm Mới',
                },
            },
            checkAll: false,
            checkbox: [],
            filterName: '',
            filterCategory: '',
            filterOrder: '',
            categories: [],
            filterStatus: '',
            allID: [],
            page: 0,
            posts: []
        }
    },
    watch: {
        checkAll() {
            if (this.checkAll) {
                this.checkbox = this.allID
            }
            else {
                this.checkbox = []
            }
        },
        page () {
            this.getApi()
        }
    },
    created() {
        Extends.LoadPage()
        this.getApi()
        axios('/api/categories?type=post').then(res => {
            this.categories = res.data.data
        })
    },
    methods: {
        async getApi() {
            Extends.LoadPage()
            let query = {
                name: this.filterName,
                category: this.filterCategory,
                order: this.filterOrder,
                status: this.filterStatus,
                page: this.page,
            }
            let posts = await axios("/api/posts", { params: query });
            this.allID = [];
            this.posts = posts.data
            posts.data.data.forEach(item => {
                this.allID.push(item.id)
            });
            KTApp.unblockPage();
        },
        async toPage(page = 1) {
            this.page = page
        },
        changeStatus(id, status) {
            axios.put('/api/posts/' + id + '?status=' + ~~status).then(res => {
                toastr.success("Thay đổi trạng thái thành công!")
            })
        },
        destroy(id = this.checkbox) {
            if (id != '') {
                Swal.fire({
                    title: "Chắc chăn chứ?",
                    text: "Bạn sẽ xóa xóa "+ id.length +" bài viết!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ok xóa!"
                }).then((result) => {
                    if (result.value) {
                        axios.delete('/api/posts/destroy', { params: { id: id } }).then(res => {
                            id.forEach(i => {
                                this.posts.data = this.posts.data.filter(item => item.id !== i)
                            });
                            Swal.fire(
                                "Thành Công!",
                                "Bài viết đã bị xóa hoàn toàn.",
                                "success"
                            )
                        })
                    }
                });
            }
            else {
                Swal.fire({
                title: 'Chưa chọn bài viết',
                showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                });
                return false
            }
        },
        formatTime(time) {
            return moment(time).format('DD/MM/YYYY');
        },
        formatHuors(time) {
            return moment(time).format('hh:mm:ss');
        },
        Text(text, length) {
            return Extends.FormatText(text, length)
        }
    },
    
}
</script>
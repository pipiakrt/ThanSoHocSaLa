<style>
    .title-post {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 1;
        overflow: hidden;
    }
    .url-post {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        overflow: hidden;
    }
    .desc-post {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 4;
        overflow: hidden;
    }
</style>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0 pb-3">
                    <div class="row mb-5">
                        <div class="col-3">
                            <input v-model="filterName" type="text" placeholder="Tên bài viết" class="form-control form-control-sm form-filter datatable-input"/>
                        </div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-4">
                                    <select v-model="filterOrder" class="form-control form-control-sm form-filter datatable-input" title="Select" data-col-index="6">
                                        <option value="DESC">Mới nhất</option>
                                        <option value="ASC">Cũ nhất</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select v-model="filterStatus" class="form-control form-control-sm form-filter datatable-input" title="Chọn" data-col-index="7">
                                        <option value="">Trạng thái</option>
                                        <option value="1">Hoạt Động</option>
                                        <option value="0">Tạm Ẩn</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select v-model="filterType" class="form-control form-control-sm form-filter datatable-input" title="Chọn" data-col-index="7">
                                        <option value="">Loại</option>
                                        <option value="post">Bài viết</option>
                                        <option value="qa">Hỏi đáp</option>
                                        <option value="introduce">Giới thiệu</option>
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
                                    <th style="min-width: 180px">Mô tả</th>
                                    <th style="min-width: 120px">Thể loại</th>
                                    <th style="min-width: 120px">Cập nhật</th>
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
                                                <div class="symbol-label" :style="`background-image: url('${item.image}')`"></div>
                                            </div>
                                            <div>
                                                <div class="title-post">
                                                    <router-link :to="'/sala-backend/bai-viet/' + item.id + '/chinh-sua'" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg" v-text="item.name"></router-link>
                                                </div>
                                                <div class="url-post">
                                                    <span class="text-muted d-block" v-text="item.slug"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="desc-post">
                                            <span class="font-weight-bolder" v-text="item.description"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="getType(item.type)"></span>
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
                                                        <router-link :to="'/sala-backend/bai-viet/' + item.id + '/chinh-sua'" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="fa fas fa-edit"></i>
                                                            </span>
                                                            <span class="navi-text">Chỉnh sửa</span>
                                                        </router-link>
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
                        :page-count="posts.last_page"
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
                        url: '/sala-backend/bai-viet/danh-sach',
                    },
                    {
                        name: 'Danh sách',
                        url: '/sala-backend/bai-viet/danh-sach',
                    },
                ],
                action: {
                    url: '/sala-backend/bai-viet/them-moi',
                    icon: 'icon-sm ki ki-plus',
                    text: 'Thêm Mới',
                },
            },
            checkAll: false,
            checkbox: [],
            filterName: '',
            filterOrder: 'DESC',
            filterStatus: '',
            filterType: '',
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
        this.getApi()
    },
    methods: {
        getType(type) {
            if (type == 'post') {
                return 'Tin tức';
            }
            else if (type == 'introduce') {
                return 'Giới thiệu';
            }
            else if (type == 'qa') {
                return 'Hỏi đáp';
            }
            else if (type == 'story') {
                return 'Câu truyện';
            }
        },
        async getApi() {
            Extends.LoadPage()
            let query = {
                name: this.filterName,
                order: this.filterOrder,
                type: this.filterType,
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
        destroy(id) {
            axios.delete('/api/posts/' + id).then(res => {
                if (res.status == 200) {
                    this.posts.data = this.posts.data.filter(item => item.id !== id)
                    Swal.fire(
                        "Thành Công!",
                        "Bài viết đã bị xóa hoàn toàn.",
                        "success"
                    )
                }
            })
        },
        formatTime(time) {
            return moment(time).format('DD/MM/YYYY');
        },
        formatHuors(time) {
            return moment(time).format('hh:mm:ss');
        }
    },

}
</script>

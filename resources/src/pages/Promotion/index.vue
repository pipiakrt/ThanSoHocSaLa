<template>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <Breadcrumb :data="subHeader" />
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">Danh sách khuyến mãi</span>
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
                        <div class="col-2">
                            <input v-model="filterName" type="text" placeholder="Tên khuyễn mãi" class="form-control form-control-sm form-filter datatable-input"/>
                        </div>
                        <div class="col-2">
                            <select v-model="filterOrder" class="form-control form-control-sm form-filter datatable-input" title="Select" data-col-index="6">
                                <option value="">Sắp xếp</option>
                                <option value="DESC">Mới nhất</option>
                                <option value="ASC">Cũ nhất</option>
                            </select>
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
                                    <th style="min-width: 60px">
                                        <span class="text-dark-75">Mã KM</span>
                                    </th>
                                    <th style="min-width: 150px">
                                        <span class="text-dark-75">Tên</span>
                                    </th>
                                    <th style="min-width: 60px">Loại</th>
                                    <th style="min-width: 60px">Mức giảm</th>
                                    <th style="min-width: 60px">Ngày bắt đầu</th>
                                    <th style="min-width: 60px">Ngày kết thúc</th>
                                    <th style="min-width: 60px">Trạng thái</th>
                                    <th class="text-center">EXT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in promotions.data" :key="'row' + item.id">
                                    <td>
                                        <label class="checkbox">
                                            <input v-model="checkbox" :value="item.id" type="checkbox"/>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="'#' + item.code"></span>
                                    </td>
                                    <td>
                                        <router-link :to="'/khuyen-mai/' + item.id + '/chinh-sua'" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg" v-text="item.title"></router-link>
                                        <span class="text-muted d-block" v-text="item.description"></span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="!item.type ? 'Theo phần trăm' : 'Theo giá'"></span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="(item.type ? item.number + 'VNĐ' : item.number + '%')"></span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="formatTime(item.start)"></span>
                                        <span class="text-muted font-weight-bold" v-text="formatHuors(item.start)"></span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="formatTime(item.end)"></span>
                                        <span class="text-muted font-weight-bold" v-text="formatHuors(item.end)"></span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ checkTime(item.end) ? 'Hết hạn' : 'Hoạt động' }}</span>
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
                                                        <router-link :to="'/khuyen-mai/' + item.id + '/chinh-sua'" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="fa fas fa-edit"></i>
                                                            </span>
                                                            <span class="navi-text">Chỉnh sửa</span>
                                                        </router-link>
                                                        <a @click="destroy([item.id])" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="flaticon2 flaticon2-trash"></i>
                                                            </span>
                                                            <span class="navi-text">Xóa khuyến mãi</span>
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
                        :page-count="promotions.meta.last_page"
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
                        name: 'khuyến mãi',
                        url: '/khuyen-mai/danh-sach',
                    },
                    {
                        name: 'Danh sách',
                        url: '/khuyen-mai/danh-sach',
                    },
                ],
                action: {
                    url: '/khuyen-mai/them-moi',
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
            promotions: []
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
        checkTime(param) {
            let date = moment(param).format('YYYY-MM-DD hh:mm:ss');
            let date1 = moment().format('YYYY-MM-DD hh:mm:ss')
            return moment(date).isBefore(date1);
        },
        async getApi() {
            Extends.LoadPage()
            let query = {
                name: this.filterName,
                order: this.filterOrder,
                page: this.page,
            }
            let promotions = await axios("/api/promotions", { params: query });
            this.allID = [];
            this.promotions = promotions.data
            promotions.data.data.forEach(item => {
                this.allID.push(item.id)
            });
            KTApp.unblockPage();
        },
        async toPage(page = 1) {
            this.page = page
        },
        destroy(id = this.checkbox) {
            if (id != '') {
                Swal.fire({
                    title: "Chắc chăn chứ?",
                    text: "Bạn sẽ xóa xóa "+ id.length +" khuyến mãi!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ok xóa!"
                }).then((result) => {
                    if (result.value) {
                        axios.delete('/api/promotions/destroy', { params: { id: id } }).then(res => {
                            id.forEach(i => {
                                this.promotions.data = this.promotions.data.filter(item => item.id !== i)
                            });
                            Swal.fire(
                                "Thành Công!",
                                "khuyến mãi đã bị xóa hoàn toàn.",
                                "success"
                            )
                        })
                    }
                });
            }
            else {
                Swal.fire({
                title: 'Chưa chọn khuyến mãi',
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
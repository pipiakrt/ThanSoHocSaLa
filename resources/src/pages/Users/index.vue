<template>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <Breadcrumb :data="subHeader" />
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">Danh sách tài khoản</span>
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
                        <div class="col-2">
                            <input v-model="filterName" type="text" placeholder="Tìm kiếm" class="form-control form-control-sm form-filter datatable-input" />
                        </div>
                        <div class="col-2">
                            <select v-model="filterOrder" class="form-control form-control-sm form-filter datatable-input" title="Select" data-col-index="6">
                                <option value="">Sắp xếp</option>
                                <option value="DESC">Mới nhất</option>
                                <option value="ASC">Cũ nhất</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <button @click="getApi()" class="btn btn-block btn-primary kt-btn btn-sm kt-btn--icon d-block">Lọc TK</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                            <thead>
                                <tr class="text-uppercase">
                                    <th class="pl-5">
                                        <span class="text-dark-75">Tài khoản</span>
                                    </th>
                                    <th style="max-width: 120px" class="text-center">Điện thoại</th>
                                    <th style="max-width: 120px" class="text-center">Ngày sinh</th>
                                    <th class="text-center">Lượt tra cứu</th>
                                    <th style="max-width: 120px" class="text-center">Ngày tạo</th>
                                    <th style="max-width: 80px" class="text-center">EXT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in members.data" :key="item.id">
                                    <td class="pl-5 pt-5">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                                <div class="symbol-label" :style="`background-image: url('${item.avatar ? item.avatar : '/img/avatar.png'}')`"></div>
                                            </div>
                                            <div>
                                                <a class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg" v-text="item.name"></a>
                                                <span class="text-muted d-block" v-text="item.email"></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="max-width: 120px" class="text-center">
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="item.phone"></span>
                                    </td>
                                    <td style="max-width: 120px" class="text-center">
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="item.birthdate"></span>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="item.number"></span>
                                    </td>
                                    <td style="max-width: 120px" class="text-center">
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="formatTime(item.created_at)"></span>
                                    </td>
                                    <td style="max-width: 80px" class="text-center">
                                        <div class="dropdown dropdown-inline">
                                            <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ki ki-bold-more-hor"></i>
                                            </a>
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
                        :page-count="members.meta.last_page"
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
                        name: 'Tài khoản',
                        url: '/sala-backend/tai-khoan',
                    },
                    {
                        name: 'Danh sách',
                        url: '/sala-backend/tai-khoan',
                    },
                ],
                action: {
                    url: '/sala-backend/tai-khoan/thong-tin',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Thông tin',
                },
            },
            page: 1,
            filterName: '',
            filterOrder: 'DESC',
            members: []
        }
    },
    created() {
        this.getApi()
    },
    watch: {
        page() {
            this.getApi()
        }
    },
    methods: {
        toPage(page = 1) {
            this.page = page
        },
        async getApi() {
            Extends.LoadPage()
            let query = {
                page: this.page,
                order: this.filterOrder,
            }
            if (this.filterName) {
                query.name = this.filterName
            }
            let members = await axios("/api/members", {
                params: query
            });
            this.members = members.data
            KTApp.unblockPage();
        },
        formatTime(time) {
            return moment(time).format('DD/MM/YYYY');
        },
    },

}
</script>

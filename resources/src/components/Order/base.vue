<style scoped>
    .table td, .table th {
        vertical-align: inherit;
    }
    .table-responsive {
        overflow-x: clip !important;
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
                        <span class="card-label font-weight-bolder text-dark">Danh sách đơn hàng</span>
                    </h3>
                    <div class="symbol-group symbol-hover">
                        <div class="card-toolbar">
                            <div class="dropdown dropdown-inline">
                                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ki ki-bold-more-hor"></i>
                                </a>
                                <div v-if="filterStatus < 2" class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <ul class="navi navi-hover">
                                        <li class="navi-item">
                                            <a @click="confirm('confirm')" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="flaticon2 flaticon2-trash"></i>
                                                </span>
                                                <span class="navi-text">Xác nhận đơn</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a @click="confirm('cancel')" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="flaticon2 flaticon2-trash"></i>
                                                </span>
                                                <span class="navi-text">Hủy đơn</span>
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
                            <input v-model="filterName" type="text" placeholder="Tên đơn hàng" class="form-control form-control-sm form-filter datatable-input" />
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
                        <table class="table table-head-custom table-head-bg table-borderless">
                            <thead>
                                <tr class="text-uppercase">
                                    <th style="max-width: 50px;">
                                        <label class="checkbox">
                                            <input type="checkbox" />
                                            <span></span>
                                        </label>
                                    </th>
                                    <th style="max-width: 100px">
                                        <span class="text-dark-75">đơn hàng</span>
                                    </th>
                                    <th>Khách Hàng</th>
                                    <th style="max-width: 320px;">Địa Chỉ</th>
                                    <th>Thanh Toán</th>
                                    <th>Gói</th>
                                    <th style="max-width: 80px">Giá</th>
                                    <th style="max-width: 80px">Ngày tạo</th>
                                    <th class="text-center">EXT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="item in orders.data">
                                    <tr :key="'row' + item.id">
                                        <td>
                                            <label class="checkbox">
                                                <input :value="item.id" type="checkbox" />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <router-link :to="'/sala-backend/don-hang/' + item.id + '/chinh-sua'" class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="`#${item.code}`"></router-link>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="`${item.name} - ${item.phone}`"></span>
                                            <span class="text-muted font-weight-bold" v-text="item.email"></span>
                                        </td>
                                        <td style="max-width: 320px;">
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="Text(item.address, 80)"></span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="item.payment"></span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="item.product_name"></span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="item.price"></span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="formatTime(item.created_at)"></span>
                                            <span class="text-muted font-weight-bold" v-text="formatHuors(item.created_at)"></span>
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown dropdown-inline">
                                                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ki ki-bold-more-hor"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-body">
                    <paginate :container-class="'phantrang'" :prev-link-class="'btn btn-icon btn-sm border-0 btn-light mr-2 my-1'" :next-link-class="'btn btn-icon btn-sm border-0 btn-light mr-2 my-1'" :first-last-button="true" :first-button-text="`<i class='ki ki-bold-double-arrow-back icon-xs'></i>`" :last-button-text="`<i class='ki ki-bold-double-arrow-next icon-xs'></i>`" :no-li-surround="true" :page-count="orders.meta.last_page" :page-range="3" :click-handler="toPage" :disabled-class="'disable'" :active-class="'btn-hover-primary active'" :prev-text="`<i class='ki ki-bold-arrow-back icon-xs'></i>`" :next-text="`<i class='ki ki-bold-arrow-next icon-xs'></i>`" :page-link-class="'btn btn-icon btn-sm border-0 btn-light mr-2 my-1'">
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
    props: ["filterStatus"],
    data() {
        return {
            subHeader: {
                links: [{
                        name: 'đơn hàng',
                        url: '/sala-backend/don-hang/danh-sach',
                    },
                    {
                        name: 'Danh sách',
                        url: '/sala-backend/don-hang/danh-sach',
                    },
                ],
                action: {
                    url: '/sala-backend/don-hang/them-moi',
                    icon: 'icon-sm ki ki-plus',
                    text: 'Thêm Mới',
                },
            },
            filterName: '',
            filterOrder: 'DESC',
            page: 1,
            orders: []
        }
    },
    watch: {
        page() {
            this.getApi()
        }
    },
    async created() {
        await this.getApi()
    },
    methods: {
        toPage(page = 1) {
            this.page = page
        },
        async getApi() {
            Extends.LoadPage()
            let query = {
                page: this.page,
                name: this.filterName,
                order: this.filterOrder,
                status: this.filterStatus,
            }
            let orders = await axios("/api/orders", {
                params: query
            });
            this.orders = orders.data
            KTApp.unblockPage();
        },
        formatTime(time) {
            return moment(time).format('DD/MM/YYYY');
        },
        formatHuors(time) {
            return moment(time).format('hh:mm:ss');
        },
        Text(text, length) {
            return Extends.FormatText(text, length)
        },
    },

}
</script>

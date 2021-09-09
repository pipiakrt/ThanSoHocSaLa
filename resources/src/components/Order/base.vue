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
                        <div class="col-2">
                            <select v-model="filterPayment" class="form-control form-control-sm form-filter datatable-input" title="Select" data-col-index="6">
                                <option value="">Hình thức thanh toán</option>
                                <option value="Ship COD">Ship COD</option>
                                <option value="Chuyển khoản ngân hàng">Chuyển khoản</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <select v-model="province_id" name="province" class="form-control form-control-sm form-filter datatable-input" aria-label="Default select example" required>
                                <option value="" selected>Tỉnh/Thành Phố</option>
                                <template v-for="item in province">
                                    <option :key="item.id" :value="item.id" v-text="item.name"></option>
                                </template>
                            </select>
                        </div>
                        <div class="col-2">
                            <input type='text' class="form-control form-control-sm form-filter datatable-input" id="kt_daterangepicker_1" readonly />
                        </div>
                        <div class="col-1">
                            <select v-model="product_id" class="form-control form-control-sm form-filter datatable-input">
                                <option value="">Gói</option>
                                <template v-for="product in products">
                                    <option v-if="product.status" :key="product.id" :value="product.id" v-text="product.name"></option>
                                </template>
                            </select>
                        </div>
                        <div class="col-1">
                            <button @click="getApi()" class="btn btn-block btn-primary kt-btn btn-sm kt-btn--icon d-block">Lọc Đơn</button>
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
                                    <th>MKT</th>
                                    <th>SALE</th>
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
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="item.mkt ? item.mkt.name : ''"></span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="item.sale ? item.sale.name : ''"></span>
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
                                                <div v-if="item.status < 3" class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                    <ul class="navi navi-hover">
                                                        <li @click="confirm(item.id, item.status + 1)" class="navi-item">
                                                            <a class="navi-link">
                                                                <span class="navi-icon">
                                                                    <i class="ki ki-check"></i>
                                                                </span>
                                                                <span class="navi-text">{{ item.status == 2 ? "Hủy đơn" : "Xác nhận" }}</span>
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
            filterPayment: '',
            province: [],
            province_id: '',
            orders: [],
            products: [],
            product_id: ''
        }
    },
    watch: {
        page() {
            this.getApi()
        }
    },
    async created() {
        await axios('/api/products').then(res => {
            this.products = res.data.data
        })
        await this.getApi()
        this.getProvinces()
        setTimeout(() => {
            $('#kt_daterangepicker_1').daterangepicker({
                buttonClasses: ' btn',
                applyClass: 'btn-primary',
                cancelClass: 'btn-secondary',
                startDate: moment().subtract(30, 'days').format('DD-MM-YYYY'),
                endDate: moment().subtract('days').format('DD-MM-YYYY'),
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
        }, 300);
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
                status: this.filterStatus,
            }
            if ($('#kt_daterangepicker_1').val()) {
                let date = $('#kt_daterangepicker_1').val().split("-");
                query.datestart = date[0].replace(" ", "");
                query.dateend = date[1].replace(" ", "");
            }
            if (this.product_id) {
                query.product = this.product_id
            }
            if (this.province_id) {
                query.province = this.province_id
            }
            if (this.district_id) {
                query.district = this.district_id
            }
            if (this.ward_id) {
                query.ward = this.ward_id
            }
            if (this.filterName) {
                query.name = this.filterName
            }
            if (this.filterPayment) {
                query.payment = this.filterPayment
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
        getProvinces () {
            axios.get('/address/province').then(response => {
                this.province = response.data
            })
        },
        confirm(id, status) {
            let params = {
                status: status
            }
            axios.put('/api/orders/' + id, params).then(res => {
                this.orders.data = this.orders.data.filter(item => item.id !== id)
                Swal.fire(
                    "Thành Công!",
                    "Xac nhận đơn hàng thành công",
                    "success"
                )
            })
        },
    },

}
</script>

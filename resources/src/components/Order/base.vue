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
                        <div class="col-6">
                            <div class="row">
                                <div class="col-3">
                                    <select v-model="filterCategory" class="form-control form-control-sm form-filter datatable-input">
                                        <option value="">Danh mục</option>
                                        <template v-for="item in categories">
                                            <option :key="item.id" v-if="item.parent_id > 0" :value="item.id" v-text="item.name"></option>
                                        </template>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <select v-model="filterPrice" class="form-control form-control-sm form-filter datatable-input">
                                        <option value="">Giá</option>
                                        <option value="DESC">Lớn dần</option>
                                        <option value="ASC">Giảm dần</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <input v-model="filterPriceUp" type="number" class="form-control form-control-sm datatable-input" placeholder="Giá Từ" />
                                </div>
                                <div class="col-3">
                                    <input v-model="filterPriceDown" type="number" class="form-control form-control-sm datatable-input" placeholder="Đến" />
                                </div>
                            </div>
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
                                            <input v-model="checkAll" type="checkbox" />
                                            <span></span>
                                        </label>
                                    </th>
                                    <th style="max-width: 100px">
                                        <span class="text-dark-75">đơn hàng</span>
                                    </th>
                                    <th>Sản phẩm</th>
                                    <th style="max-width: 80px">Tổng tiền</th>
                                    <th style="max-width: 80px">Ngày tạo</th>
                                    <th class="text-center">EXT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="item in orders.data">
                                    <tr :key="'row' + item.id" v-if="item.products != ''">
                                        <td>
                                            <label class="checkbox">
                                                <input v-model="checkbox" :value="item.id" type="checkbox" />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="`#${item.code}`"></span>
                                        </td>
                                        <td>
                                            <template v-for="(product, i) in item.products">
                                                <div :key="i" class="d-flex align-items-center py-1">
                                                    <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                                        <div class="symbol-label" :style="`background-image: url('${product.avatar}')`"></div>
                                                    </div>
                                                    <div>
                                                        <a class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg" v-text="Text(product.name, 50)"></a>
                                                        <span class="text-muted d-block">{{ formatPrice(product.price) }} x{{ product.number }}</span>
                                                    </div>
                                                </div>
                                            </template>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="formatPrice(item.total_money)"></span>
                                            <span class="text-muted font-weight-bold" v-text="item.price"></span>
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
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                    <ul class="navi navi-hover">
                                                        <li class="navi-item">
                                                            <a @click="orderInfo = item" data-toggle="modal" data-target="#exampleModalLong" class="navi-link">
                                                                <span class="navi-icon">
                                                                    <i class="fas fa-external-link-alt"></i>
                                                                </span>
                                                                <span class="navi-text">Chi tiết</span>
                                                            </a>
                                                            <a v-if="filterStatus < 2" @click="confirm('confirm', [item.id])" class="navi-link">
                                                                <span class="navi-icon">
                                                                    <i class="fas fa-external-link-alt"></i>
                                                                </span>
                                                                <span class="navi-text">Xác nhận</span>
                                                            </a>
                                                            <a v-if="filterStatus < 2" @click="confirm('cancel', [item.id])" class="navi-link">
                                                                <span class="navi-icon">
                                                                    <i class="flaticon2 flaticon2-trash"></i>
                                                                </span>
                                                                <span class="navi-text">Hủy đơn</span>
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

    <!-- Modal-->
    <div class="modal fade" id="exampleModalLong" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="card-label">Thông tin <span class="d-block text-muted pt-2 font-size-sm">Thông tin đơn hàng</span></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-custom" v-if="orderInfo">
                        <div class="card-body py-4">
                            <div class="form-group row my-2">
                                <label class="col-4 col-form-label">Họ Tên:</label>
                                <div class="col-8">
                                    <span class="form-control-plaintext font-weight-bolder">{{ orderInfo.user.name }}</span>
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <label class="col-4 col-form-label">Mã đơn:</label>
                                <div class="col-8">
                                    <span class="form-control-plaintext font-weight-bolder">#{{ orderInfo.code }}</span>
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <label class="col-4 col-form-label">Ngày tạo:</label>
                                <div class="col-8">
                                    <span class="form-control-plaintext font-weight-bolder">{{ formatTime(orderInfo.created_at) }}</span>
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <label class="col-4 col-form-label">Email:</label>
                                <div class="col-8">
                                    <span class="form-control-plaintext font-weight-bolder">{{ orderInfo.user.email }}</span>
                                </div>
                            </div>
                            <div class="form-group row my-2  justify-content-end">
                                <label class="col-12 col-form-label">Đơn hàng:</label>
                                <div class="col-11">
                                    <template v-for="(product, i) in orderInfo.products">
                                        <div :key="i" class="d-flex py-1">
                                            <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                                <div class="symbol-label" :style="`background-image: url('${product.avatar}')`"></div>
                                            </div>
                                            <div>
                                                <a class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg" v-text="Text(product.name, 50)"></a>
                                                <span class="text-muted d-block">{{ formatPrice(product.price) }} x{{ product.number }}</span>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <label class="col-4 col-form-label">Tổng tiền:</label>
                                <div class="col-8">
                                    <span class="form-control-plaintext font-weight-bolder">{{ formatPrice(orderInfo.total_money) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn float-right btn-light-primary font-weight-bold">Đóng</a>
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
                        url: '/don-hang/danh-sach',
                    },
                    {
                        name: 'Danh sách',
                        url: '/don-hang/danh-sach',
                    },
                ],
                action: {
                    url: '/don-hang/them-moi',
                    icon: 'icon-sm ki ki-plus',
                    text: 'Thêm Mới',
                },
            },
            orderInfo: '',
            categories: [],
            filterName: '',
            filterCategory: '',
            filterOrder: '',
            filterPrice: '',
            filterPriceUp: '',
            filterPriceDown: '',
            page: 1,
            checkAll: false,
            checkbox: [],
            allID: [],
            orders: []
        }
    },
    watch: {
        checkAll() {
            if (this.checkAll) {
                this.checkbox = this.allID
            } else {
                this.checkbox = []
            }
        },
        filterOrder() {
            this.filterPrice = ''
        },
        filterPrice() {
            this.filterOrder = ''
        },
        page() {
            this.getApi()
        }
    },
    created() {
        this.getApi()
        axios('/api/categories?type=product').then(res => {
            this.categories = res.data.data
        })
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
                category: this.filterCategory,
                order: this.filterOrder,
                price: this.filterPrice,
                status: this.filterStatus,
                PriceUp: this.filterPriceUp,
                PriceDown: this.filterPriceDown,
            }
            let orders = await axios("/api/orders", {
                params: query
            });
            this.orders = orders.data
            this.allID = [];
            orders.data.data.forEach(item => {
                this.allID.push(item.id)
            });
            KTApp.unblockPage();
        },
        confirm(type, id = this.checkbox) {
            let params = {}
            if (type == 'confirm') {
                params = {
                    id,
                    status: this.filterStatus + 1
                }
            } else if (type == 'cancel') {
                params = {
                    id,
                    status: 3
                }
            }
            if (id != '') {
                axios.put('/api/orders/confirm', params).then(res => {
                    id.forEach(i => {
                        this.orders.data = this.orders.data.filter(item => item.id !== i)
                    });
                    Swal.fire(
                        "Thành Công!",
                        "Xac nhận đơn hàng thành công",
                        "success"
                    )
                })
            } else {
                Swal.fire({
                    title: 'Chưa chọn đơn hàng',
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
        },
        formatPrice(price) {
            return Extends.formartPrice(price)
        }
    },

}
</script>

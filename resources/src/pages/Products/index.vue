<template>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <Breadcrumb :data="subHeader" />
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">Danh sách Sản phẩm</span>
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
                                    <th style="min-width: 200px">
                                        <span class="text-dark-75">Sản phẩm</span>
                                    </th>
                                    <th style="min-width: 100px">Mô tả</th>
                                    <th style="min-width: 100px">Khuyễn mãi</th>
                                    <th style="min-width: 120px">Giá</th>
                                    <th style="min-width: 120px">Ngày tạo</th>
                                    <th style="min-width: 100px">Trạng thái</th>
                                    <th class="text-center">EXT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in products.data" :key="'row' + item.id">
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
                                                <router-link :to="'/sala-backend/san-pham/' + item.id + '/chinh-sua'" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg" v-text="Text(item.name, 50)"></router-link>
                                                <span class="text-muted d-block" v-text="Text(item.slug, 50)"></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="Text(item.description, 250)"></span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ item.promotion[0].title }}</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="item.price"></span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="formatTime(item.created_at)"></span>
                                        <span class="text-muted font-weight-bold" v-text="formatHuors(item.created_at)"></span>
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
                                                        <router-link :to="'/sala-backend/san-pham/' + item.id + '/chinh-sua'" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="fa fas fa-edit"></i>
                                                            </span>
                                                            <span class="navi-text">Chỉnh sửa</span>
                                                        </router-link>
                                                        <a @click="destroy([item.id])" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="flaticon2 flaticon2-trash"></i>
                                                            </span>
                                                            <span class="navi-text">Xóa Sản phẩm</span>
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
</template>

<script>
import Extends from '../../extend';
import Breadcrumb from '../../components/breadcrumb/index'
import moment from 'moment'
export default {
    components: {
        Breadcrumb,
    },
    data() {
        return {
            subHeader: {
                links: [{
                        name: 'Sản phẩm',
                        url: '/sala-backend/san-pham/danh-sach',
                    },
                    {
                        name: 'Danh sách',
                        url: '/sala-backend/san-pham/danh-sach',
                    },
                ],
                action: {
                    url: '/sala-backend/san-pham/them-moi',
                    icon: 'icon-sm ki ki-plus',
                    text: 'Thêm Mới',
                },
            },
            filterName: '',
            filterOrder: '',
            filterPrice: '',
            filterStatus: '',
            filterPriceUp: '',
            filterPriceDown: '',
            page: 1,
            checkAll: false,
            checkbox: [],
            allID: [],
            products: []
        }
    },
    created() {
        this.getApi()
    },
    methods: {
        formatPrice(price) {
            return Extends.formartPrice(price)
        },
        async getApi() {
            Extends.LoadPage()
            let products = await axios("/api/products");
            this.products = products.data
            KTApp.unblockPage();
        },
        changeStatus(id, status) {
            axios.put('/api/products/' + id + '?status=' + ~~status).then(res => {
                toastr.success("Thay đổi trạng thái thành công!")
            })
        },
        destroy(id = this.checkbox) {
            if (id != '') {
                Swal.fire({
                    title: "Chắc chăn chứ?",
                    text: "Bạn sẽ xóa xóa "+ id.length +" Sản phẩm!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ok xóa!"
                }).then((result) => {
                    if (result.value) {
                        axios.delete('/api/products/destroy', { params: { id: id } }).then(res => {
                            id.forEach(i => {
                                this.products.data = this.products.data.filter(item => item.id !== i)
                            });
                            Swal.fire(
                                "Thành Công!",
                                "Sản phẩm đã bị xóa hoàn toàn.",
                                "success"
                            )
                        })
                    }
                });
            }
            else {
                Swal.fire({
                title: 'Chưa chọn Sản phẩm',
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

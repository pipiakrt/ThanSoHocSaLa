<template>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <Breadcrumb :data="subHeader" />
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">Danh sách page</span>
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
                                    <th style="min-width: 300px" class="pl-0">
                                        <span class="text-dark-75">Link Page</span>
                                    </th>
                                    <th style="min-width: 120px">Meta description</th>
                                    <th style="min-width: 120px">Meta keywords nhật</th>
                                    <th class="text-center">EXT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in seos" :key="'row' + item.id">
                                    <td>
                                        <label class="checkbox">
                                            <input v-model="checkbox" :value="item.id" type="checkbox"/>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td class="pl-0 py-8">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <router-link :to="'/admin/seo/' + item.id + '/chinh-sua'" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg" v-text="Text(item.url, 50)"></router-link>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="Text(item.description, 250)"></span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="Text(item.keywords, 250)"></span>
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
                                                        <router-link :to="'/admin/seo/' + item.id + '/chinh-sua'" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="fa fas fa-edit"></i>
                                                            </span>
                                                            <span class="navi-text">Chỉnh sửa</span>
                                                        </router-link>
                                                        <a @click="destroy([item.id])" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="flaticon2 flaticon2-trash"></i>
                                                            </span>
                                                            <span class="navi-text">Xóa seo page</span>
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
                        :page-count="seos.last_page"
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
                        name: 'seo page',
                        url: '/admin/seo/danh-sach',
                    },
                    {
                        name: 'Danh sách',
                        url: '/admin/seo/danh-sach',
                    },
                ],
                action: {
                    url: '/admin/seo/them-moi',
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
            seos: []
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
        async getApi() {
            Extends.LoadPage()
            let seos = await axios("/api/seos");
            this.allID = [];
            this.seos = seos.data
            seos.data.forEach(item => {
                this.allID.push(item.id)
            });
            KTApp.unblockPage();
        },
        async toPage(page = 1) {
            this.page = page
        },
        changeStatus(id, status) {
            axios.put('/api/seos/' + id + '?status=' + ~~status).then(res => {
                toastr.success("Thay đổi trạng thái thành công!")
            })
        },
        destroy(id = this.checkbox) {
            if (id != '') {
                Swal.fire({
                    title: "Chắc chăn chứ?",
                    text: "Bạn sẽ xóa xóa "+ id.length +" seo page!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ok xóa!"
                }).then((result) => {
                    if (result.value) {
                        axios.delete('/api/seos/destroy', { params: { id: id } }).then(res => {
                            id.forEach(i => {
                                this.seos.data = this.seos.data.filter(item => item.id !== i)
                            });
                            Swal.fire(
                                "Thành Công!",
                                "seo page đã bị xóa hoàn toàn.",
                                "success"
                            )
                        })
                    }
                });
            }
            else {
                Swal.fire({
                title: 'Chưa chọn seo page',
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

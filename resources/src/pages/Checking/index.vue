<template>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <Breadcrumb :data="subHeader" />
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">Danh sách checking</span>
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
                            <input v-model="filterIp" type="text" placeholder="Lọc IP" class="form-control form-control-sm form-filter datatable-input" />
                        </div>
                        <div class="col-1">
                            <button @click="getApi()" class="btn btn-block btn-primary kt-btn btn-sm kt-btn--icon d-block">Lọc IP</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                            <thead>
                                <tr class="text-uppercase">
                                    <th style="min-width: 75px" class="pl-5">
                                        <span class="text-dark-75">IP</span>
                                    </th>
                                    <th style="min-width: 200px">Người dùng</th>
                                    <th style="max-width: 300px">URl</th>
                                    <th style="min-width: 200px">Thiết bị</th>
                                    <th style="min-width: 120px">Trình duyệt</th>
                                    <th style="min-width: 150px">Màn hình</th>
                                    <th style="min-width: 100px">Thời gian</th>
                                    <th class="text-center">EXT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in listData.data" :key="'row' + item.id">
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="item.ip"></span>
                                    </td>
                                    <td style="max-width: 200px">
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="item.user ? `${item.user.name} - ${item.user.phone}` : ''"></span>
                                        <span class="text-muted font-weight-bold" v-text="item.user ? item.user.email : ''"></span>
                                    </td>
                                    <td style="max-width: 275px; overflow: hidden;">
                                        <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                            {{ item.url }}
                                        </div>
                                    </td>
                                    <td style="max-width: 200px">
                                        <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                            {{ item.device }}
                                        </div>
                                    </td>
                                    <td style="max-width: 120px">
                                        <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                            {{ item.browser }}
                                        </div>
                                    </td>
                                    <td style="max-width: 150px">
                                        <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                            {{ item.screen }}
                                        </div>
                                    </td>
                                    <td style="max-width: 100px">
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
                        :page-count="(page + 5)"
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
                        name: 'checking',
                        url: '/sala-backend/checking',
                    },
                ],
                action: {
                    url: '/sala-backend/',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Dashboard',
                },
            },
            listData: [],
            filterIp: '',
            page: 1
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
            }
            if (this.filterIp) {
                query.ip = this.filterIp
            }
            let listData = await axios("/api/checking", {
                params: query
            });
            this.listData = listData.data
            KTApp.unblockPage();
        },
        formatTime(time) {
            return moment(time).format('DD/MM/YYYY');
        },
        formatHuors(time) {
            return moment(time).format('hh:mm:ss');
        },
    },

}
</script>

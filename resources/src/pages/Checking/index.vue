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
                    <div class="table-responsive">
                        <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                            <thead>
                                <tr class="text-uppercase">
                                    <th style="min-width: 250px" class="pl-5">
                                        <span class="text-dark-75">Họ tên</span>
                                    </th>
                                    <th style="min-width: 120px">Nội dung</th>
                                    <th style="min-width: 100px">Số điện thoại</th>
                                    <th style="min-width: 100px">Số lượng</th>
                                    <th style="min-width: 100px">Ngày tạo</th>
                                    <th class="text-center">EXT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in posts.data" :key="'row' + item.id">
                                    <td class="pl-0 py-8">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                                {{ item.name }}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                            {{ item.content }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                            {{ item.phone }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                            {{ item.number }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                            {{ formatTime(item.created_at) }}
                                        </div>
                                    </td>
                                    
                                    <td class="text-center">
                                        <div class="dropdown dropdown-inline">
                                            <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ki ki-bold-more-hor"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                <ul class="navi navi-hover">
                                                    <li class="navi-item">
                                                        <a @click="destroy(item.id)" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="flaticon2 flaticon2-trash"></i>
                                                            </span>
                                                            <span class="navi-text">Xóa</span>
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
                        name: 'checking',
                        url: '/checking',
                    },
                ],
                action: {
                    url: '/',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Dashboard',
                },
            },
            posts: []
        }
    },
    created() {
        this.toPage()
    },
    methods: {
        async toPage(page = 1) {
            Extends.LoadPage()
            let posts = await axios("/api/checkings?page=" + page);
            this.posts = posts.data
            KTApp.unblockPage();
        },
        formatTime(time) {
            return moment(time).format('DD/MM/YYYY');
        },
        destroy(id) {
            axios.delete('/api/checkings/' + id).then(res => {
                this.posts.data = this.posts.data.filter(item => item.id !== id)
            })
        },
    },
    
}
</script>
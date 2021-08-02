<template>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <Breadcrumb :data="subHeader" />
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">Danh sách luận giải</span>
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
                                    <th style="min-width: 50px;">
                                        <label class="checkbox">
                                            <input type="checkbox" />
                                            <span></span>
                                        </label>
                                    </th>
                                    <th style="max-width: 600px" class="pl-0">
                                        <span class="text-dark-75">Tên luận giải</span>
                                    </th>
                                    <th style="min-width: 100px">Nội dung</th>
                                    <th style="min-width: 120px">Mã</th>
                                    <th style="min-width: 120px">Loại</th>
                                    <th class="text-center">EXT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in thansohoc.data" :key="'row' + item.id">
                                    <td>
                                        <label class="checkbox">
                                            <input :value="item.id" type="checkbox"/>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td class="pl-0 py-8">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <router-link :to="'/admin/luan-giai/' + item.id + '/chinh-sua'" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg" v-text="Text(item.title, 50)"></router-link>
                                                <span class="text-muted d-block" v-text="Text(item.slug, 50)"></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="max-width: 600px">
                                        <div class="text-dark-75 font-weight-bolder d-block font-size-lg" v-html="Text(item.content, 300)"></div>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="Text(item.code, 250)"></span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="Text(item.type, 250)"></span>
                                    </td>

                                    <td class="text-center">
                                        <div class="dropdown dropdown-inline">
                                            <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ki ki-bold-more-hor"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                <ul class="navi navi-hover">
                                                    <li class="navi-item">
                                                        <router-link :to="'/admin/luan-giai/' + item.id + '/chinh-sua'" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="fa fas fa-edit"></i>
                                                            </span>
                                                            <span class="navi-text">Chỉnh sửa</span>
                                                        </router-link>
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
                        :page-count="thansohoc.meta.last_page"
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
export default {
    components: {
        Breadcrumb,
        Paginate
    },
    data() {
        return {
            subHeader: {
                links: [{
                        name: 'luận giải',
                        url: '/admin/luan-giai/danh-sach',
                    },
                    {
                        name: 'Danh sách',
                        url: '/admin/luan-giai/danh-sach',
                    },
                ],
                action: {
                    url: '/admin/luan-giai/them-moi',
                    icon: 'icon-sm ki ki-plus',
                    text: 'Thêm Mới',
                },
            },
            page: 0,
            thansohoc: []
        }
    },
    watch: {
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
            let query = {
                page: this.page,
            }
            let thansohoc = await axios("/api/thanso", { params: query });
            this.thansohoc = thansohoc.data
            KTApp.unblockPage();
        },
        async toPage(page = 1) {
            this.page = page
        },
        Text(text, length) {
            return Extends.FormatText(text, length)
        }
    },

}
</script>

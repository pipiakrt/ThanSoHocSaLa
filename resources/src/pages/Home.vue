<template>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <Breadcrumb :data="subHeader" />
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row">
                <template v-for="(items, id) in data_home.GroupData_1">
                    <div :key="id" class="col-lg-6 col-xxl-4">
                        <!--begin::List Widget 9-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header align-items-center border-0 mt-4">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="font-weight-bolder text-dark" v-text="items.name"></span>
                                    <span class="text-muted mt-3 font-weight-bold font-size-sm" v-text="items.count"></span>
                                </h3>
                                <div class="card-toolbar">
                                    <div class="dropdown dropdown-inline">
                                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ki ki-bold-more-hor"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-4">
                                <!--begin::Timeline-->
                                <div class="timeline timeline-6 mt-3">
                                    <!--begin::Item-->
                                    <template v-for="(item, key) in items.list">
                                        <div :key="key" class="timeline-item align-items-start">
                                            <!--begin::Label-->
                                            <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg" v-text="formatHuors(item.created_at)"></div>
                                            <!--end::Label-->
                                            <!--begin::Badge-->
                                            <div class="timeline-badge">
                                                <i :class="`fa fa-genderless icon-xl text-${random_color()}`"></i>
                                            </div>
                                            <!--end::Badge-->
                                            <!--begin::Text-->
                                            <div class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">{{ item.name }}, {{ item.phone }}</div>
                                            <!--end::Text-->
                                        </div>
                                    </template>
                                    <!--end::Item-->
                                </div>
                                <!--end::Timeline-->
                            </div>
                            <!--end: Card Body-->
                        </div>
                        <!--end: List Widget 9-->
                    </div>
                </template>

                <template v-for="(items, id) in data_home.GroupData_2">
                    <div :key="id" class="col-lg-6 col-xxl-4 order-1 order-xxl-2">
                        <!--begin::List Widget 3-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0">
                                <h3 class="card-title font-weight-bolder text-dark" v-text="items.name"></h3>
                                <div class="card-toolbar">
                                    <div class="dropdown dropdown-inline">
                                        <a href="#" class="btn btn-light-primary btn-sm font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">August</a>
                                    </div>
                                </div>
                            </div>
                            <!--begin::Body-->
                            <div class="card-body pt-2">
                                <template v-for="(item, key) in items.list">
                                    <div :key="key" class="d-flex align-items-center mb-10">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40 symbol-light-success mr-5">
                                            <span class="symbol-label">
                                                <img src="/img/009-boy-4.svg" class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>
                                        <!--begin::Text-->
                                        <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                                            <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Ricky Hunt</a>
                                            <span class="text-muted">PHP, SQLite, Artisan CLI</span>
                                        </div>
                                        <!--begin::Dropdown-->
                                        <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="left">
                                            <a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ki ki-bold-more-hor"></i>
                                            </a>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::List Widget 3-->
                    </div>
                </template>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Extends from '../extend';
import Breadcrumb from '../components/breadcrumb/index'
import moment from 'moment'
export default {
    components: {
        Breadcrumb
    },
    data() {
        return {
            subHeader: {
                links: [{
                    name: 'Trang Chủ',
                    url: '/sala-backend/',
                }, ],
                action: {
                    url: '/sala-backend/',
                    icon: '',
                    text: 'Trang chủ',
                },
            },
            data_home: []
        }
    },
    created() {
        Extends.LoadPage()
        axios('/api/home').then(res => {
            KTApp.unblockPage();
            this.data_home = res.data
        })
    },
    methods: {
        random_color() {
            const months = ["primary", "secondary", "success", "danger", "warning", "info", "dark", "muted"];
            const random = Math.floor(Math.random() * months.length);
            return months[random];
        },
        formatTime(time) {
            return moment(time).format('DD/MM/YYYY');
        },
        formatHuors(time) {
            return moment(time).format('hh:mm');
        },
    },
}
</script>

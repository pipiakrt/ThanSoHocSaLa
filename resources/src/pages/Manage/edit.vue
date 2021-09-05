<template>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <Breadcrumb :data="subHeader" />
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line nav-tabs-line-3x">
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                            <li class="nav-item mr-3">
                                <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1">
                                    <span class="nav-icon">
                                        <span class="svg-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                                                    <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="nav-text font-size-lg">Tài khoản</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                            <div class="row">
                                <div class="col-xl-2"></div>
                                <div class="col-xl-7 my-2">
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Họ tên</label>
                                        <div class="col-9">
                                            <input disabled :value="name" class="form-control form-control-lg form-control-solid" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Tài khoản</label>
                                        <div class="col-9">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <input disabled :value="email" type="text" class="form-control form-control-lg form-control-solid" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Phòng ban</label>
                                        <div class="col-9">
                                            <select v-model="type" class="form-control" style="height: 35px">
                                                <template v-for="item in phongban">
                                                    <option :key="item.type" :value="item.type" v-text="item.name"></option>
                                                </template>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Vịt trí</label>
                                        <div class="col-9">
                                            <input v-model="vitri" class="form-control" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Quyền</label>
                                        <div class="col-9">
                                            <select id="permission" v-model="permission" class="form-control" multiple="multiple" style="height: 35px">
                                                <option value="administrator" style="display: none">Administrator</option>
                                                <template v-for="item in list_permissions">
                                                    <option :key="item.type" :value="item.type" v-text="item.name" style="display: none"></option>
                                                </template>
                                            </select>
                                            <div class="text-left mt-7">
                                                <button @click="submit()" class="btn btn-primary mr-2">Cập nhật</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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

export default {
    components: {
        Breadcrumb,
    },
    data() {
        return {
            subHeader: {
                links: [{
                        name: 'Thông tin',
                        url: '/sala-backend/tai-khoan/thong-tin',
                    },
                    {
                        name: 'Thêm mới',
                        url: '/sala-backend/tai-khoan/them-moi',
                    },
                ],
                action: {
                    url: '/sala-backend/',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Dashboard',
                },
            },
            email: '',
            name: '',
            permissions: '',
            permission: '',
            model: [
                {
                    name: "Sản phẩm",
                    type: "App_Models_Product",
                },
                {
                    name: "Tin tức",
                    type: "App_Models_Post",
                },
                {
                    name: "Đơn hàng",
                    type: "App_Models_Order",
                },
                {
                    name: "Luận giải",
                    type: "App_Models_ThanSo",
                },
                {
                    name: "Tài khoản",
                    type: "App_Models_User",
                },
                {
                    name: "Phần quyền",
                    type: "App_Models_Permission",
                },
            ],
            action: [
                {
                    name: "Xem danh sách",
                    type: "viewAny",
                },
                {
                    name: "Xem chi tiết",
                    type: "view",
                },
                {
                    name: "Tạo",
                    type: "create",
                },
                {
                    name: "Cập nhật",
                    type: "update",
                },
                {
                    name: "Xóa",
                    type: "delete",
                },
                {
                    name: "Xóa hàng loạt",
                    type: "forceDelete",
                },
            ],
            type: '',
            vitri: '',
            phongban: [
                {
                    name: "Giám Đốc",
                    type: "giam-doc",
                },
                {
                    name: "Marketting",
                    type: "marketting",
                },
                {
                    name: "Sale / Chốt đơn",
                    type: "sale",
                },
                {
                    name: "Kho Vận",
                    type: "kho-van",
                },
                {
                    name: "Hành chính - Nhân sự",
                    type: "htns",
                },
                {
                    name: "Kế toán",
                    type: "ke-toan",
                },
            ],
            list_permissions: []
        }
    },
    created() {
        this.model.forEach(model => {
            this.action.forEach(action => {
                this.list_permissions.push({
                    type: this.type,
                    vitri: this.vitri,
                    name: action.name + " " + model.name,
                    type: model.type.replaceAll("_", "\\") + "-" + action.type,
                })
            });
        });
        Extends.LoadPage()
        axios('/api/permissions/' + this.$route.params.id).then(res => {
            KTApp.unblockPage();
            this.email = res.data.data.email
            this.name = res.data.data.name

            KTUtil.ready(function () {
                $('#permission').select2({
                    placeholder: "Chọn quyền",
                });
            });

            let cmId = [];
            res.data.data.permissions.forEach(item => {
                cmId.push(item.name)
            });
            $('#permission').val(cmId);
            $('#permission').trigger('change');
        })
    },
    methods: {
        async submit() {
            let params = {
                name: $('#permission').select2("val"),
            }
            Extends.LoadPage()
            axios.put('/api/permissions/' + this.$route.params.id, params).then((res) => {
                KTApp.unblockPage();
                Swal.fire(
                    "Thành Công!",
                    "Đã cập nhật quyền hạn của tài khoản này!",
                    "success"
                )
            })
        },
    },
}
</script>

<template>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <Breadcrumb :data="subHeader" />
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class='col-md-12'>
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin chung</h3>
                        </div>
                        <form ref="FormPost">
                            <div class="card-body">
                                <div class="form-group mb">
                                    <div class="alert alert-custom alert-default" role="alert">
                                        <div class="alert-icon">
                                            <i class="ki ki-outline-info icon-2x text-primary"></i>
                                        </div>
                                        <div class="alert-text">3 Bài viết giới thiệu</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Đường đẫn</label>
                                    <div class="col-10">
                                        <input v-model="data.baiviet1" class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Đường đẫn</label>
                                    <div class="col-10">
                                        <input v-model="data.baiviet2" class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Đường đẫn</label>
                                    <div class="col-10">
                                        <input v-model="data.baiviet3" class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="form-group mb">
                                    <div class="alert alert-custom alert-default" role="alert">
                                        <div class="alert-icon">
                                            <i class="ki ki-outline-info icon-2x text-primary"></i>
                                        </div>
                                        <div class="alert-text">5 Bài viết ý nghĩa cách chỉ số</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Đường đẫn</label>
                                    <div class="col-10">
                                        <input v-model="data.ynghia1" class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Đường đẫn</label>
                                    <div class="col-10">
                                        <input v-model="data.ynghia2" class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Đường đẫn</label>
                                    <div class="col-10">
                                        <input v-model="data.ynghia3" class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Đường đẫn</label>
                                    <div class="col-10">
                                        <input v-model="data.ynghia4" class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Đường đẫn</label>
                                    <div class="col-10">
                                        <input v-model="data.ynghia5" class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="form-group mb">
                                    <div class="alert alert-custom alert-default" role="alert">
                                        <div class="alert-icon">
                                            <i class="ki ki-outline-info icon-2x text-primary"></i>
                                        </div>
                                        <div class="alert-text">Bài viết giới thiệu chuyên gia</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Đường đẫn</label>
                                    <div class="col-10">
                                        <input v-model="data.chuyengia1" class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="form-group mb">
                                    <div class="alert alert-custom alert-default" role="alert">
                                        <div class="alert-icon">
                                            <i class="ki ki-outline-info icon-2x text-primary"></i>
                                        </div>
                                        <div class="alert-text">Trang Dịch Vụ</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Dịch Vụ Tư Vấn</label>
                                    <div class="col-10">
                                        <input v-model="data.service1" class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Dịch Vụ Xem Online</label>
                                    <div class="col-10">
                                        <input v-model="data.service2" class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-2 col-form-label">Dịch Vụ Sinh Trắc Vân Tay</label>
                                    <div class="col-10">
                                        <input v-model="data.service3" class="form-control" type="text" />
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card-footer text-center">
                            <button type="reset" @click="submit(1)" class="btn btn-primary mr-1"><i class="icon-sm ki ki-bold-check-1"></i> Lưu Lại</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Breadcrumb from '../../components/breadcrumb/index'

export default {
    components: {
        Breadcrumb
    },
    data() {
        return {
            subHeader: {
                links: [{
                        name: 'Bài viết',
                        url: '/admin/bai-viet/danh-sach',
                    },
                    {
                        name: 'Thêm mới',
                        url: '/admin/bai-viet/them-moi',
                    },
                ],
                action: {
                    url: '/admin/bai-viet/danh-sach',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Danh Sách',
                }
            },
            data: {
                baiviet1: "",
                baiviet2: "",
                baiviet3: "",
                ynghia1: "",
                ynghia2: "",
                ynghia3: "",
                ynghia4: "",
                ynghia5: "",
                chuyengia1: "",
                service1: "",
                service2: "",
                service3: "",
            }
        }
    },
    created() {
        axios.get('/api/homepage').then((res) => {
            this.data = res.data.data
        })
    },
    methods: {
        async submit() {
            let params = {
                data: this.data
            }

            KTApp.blockPage({
                overlayColor: "#000000",
                state: "primary",
                message: "Đợi Xíu...",
            })

            axios.put('/api/homepage/1', params).then((res) => {
                KTApp.unblockPage();
                toastr.success("Cập nhật thành công!");
            })
        }
    }
}
</script>

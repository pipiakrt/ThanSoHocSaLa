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
                                        <div class="alert-text">Lưu ý <code>URL</code> Không nên để khoảng trống!</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="slug" class="col-2 col-form-label">URL</label>
                                    <div class="col-10">
                                        <input v-model="url" class="form-control" type="search" placeholder="Đường dẫn tới page"  />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="title" class="col-2 col-form-label">Tên Page</label>
                                    <div class="col-10">
                                        <input v-model="title" id="title" class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-2 col-form-label">Meta description</label>
                                    <div class="col-10">
                                        <textarea v-model="description" class="form-control" rows="9" id="description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-2 col-form-label">Meta keywords</label>
                                    <div class="col-10">
                                        <textarea v-model="keywords" class="form-control" rows="9" id="description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="script" class="col-2 col-form-label">Script schema</label>
                                    <div class="col-10">
                                        <textarea v-model="schema" class="form-control" rows="9" id="script"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card-footer text-center">
                            <router-link to="/sala-backend/seo/danh-sach" type="reset" class="btn btn-light-primary mr-1 font-weight-bolder"><i class="icon-sm ki ki-long-arrow-back"></i> Quay Lại</router-link>
                            <button type="reset" @click="submit(1)" class="btn btn-primary mr-1"><i class="icon-sm ki ki-bold-check-1   "></i> Lưu seo page</button>
                            <button type="reset" @click="submit(0)" class="btn btn-primary mr-1"><i class="icon-sm ki ki-info"></i> Lưu Ẩn</button>
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
                        name: 'Seo page',
                        url: '/sala-backend/seo/danh-sach',
                    },
                    {
                        name: 'Thêm mới',
                        url: '/sala-backend/seo/them-moi',
                    },
                ],
                action: {
                    url: '/sala-backend/seo/danh-sach',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Danh Sách',
                }
            },
            id: '',
            url: '',
            title: '',
            description: '',
            keywords: '',
            schema: ''
        }
    },
    async mounted() {
        await axios('/api/seos/' + this.$route.params.id).then(res => {
            this.id = res.data.id
            this.url = res.data.url
            this.title = res.data.title
            this.description = res.data.description
            this.keywords = res.data.keywords
            this.schema = res.data.schema
        })
    },
    methods: {
        async submit() {
            let params = {
                url: this.url,
                title: this.title,
                description: this.description,
                keywords: this.keywords,
                schema: this.schema,
            }

            KTApp.blockPage({
                overlayColor: "#000000",
                state: "primary",
                message: "Đợi Xíu...",
            })
            axios.put('/api/seos/' + this.id, params).then((res) => {
                KTApp.unblockPage();
                toastr.success("Tạo seo page thành công!")
                this.$router.push('/sala-backend/seo/danh-sach');
            })
        }
    }
}
</script>

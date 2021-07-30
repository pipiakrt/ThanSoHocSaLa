<template>
<div class="row justify-content-center align-content-center h-100" style="background-image: url(https://www.salagroup.vn/img/sala_back.jpg); background-size: cover;">
    <div class="col-3">
        <div class="login-form login-signin">
            <ValidationObserver ref="errors">
                <div class="pb-13 pt-lg-0 pt-5">
                    <h3 class="font-weight-bolder text-white font-size-h4 font-size-h1-lg">Đăng nhập</h3>
                </div>
                <div class="form-group">
                    <label class="font-size-h6 font-weight-bolder text-white">Tài khoản</label>
                    <validation-provider rules="required|length:0,255" v-slot="{ errors }">
                        <input v-model="email" :class="formClass + (errors[0] ? 'is-invalid' : '')" type="email" />
                        <span v-if="errors[0]" class="invalid-feedback" role="alert">
                            <strong v-text="errors[0]"> ads d</strong>
                        </span>
                    </validation-provider>
                </div>

                <div class="form-group">
                    <div class="d-flex justify-content-between mt-n5">
                        <label class="font-size-h6 font-weight-bolder text-white pt-5">Mật khẩu</label>
                    </div>
                    <validation-provider rules="required|length:0,255" v-slot="{ errors }">
                        <input v-model="password" :class="formClass + (errors[0] ? 'is-invalid' : '')" type="password" />
                        <span v-if="errors[0]" class="invalid-feedback" role="alert">
                            <strong v-text="errors[0]"> ads d</strong>
                        </span>
                    </validation-provider>
                </div>
                <div class="pb-lg-0 pb-5">
                    <button @click="login()" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-1">Đăng nhập</button>
                </div>
            </ValidationObserver>
        </div>
    </div>
</div>
</template>

<script>
import Extends from '../../extend';
import {
    ValidationObserver,
    ValidationProvider
} from 'vee-validate';
export default {
    data() {
        return {
            email: '',
            password: '',
            formClass: 'form-control form-control-solid h-auto py-6 px-6 rounded-lg'
        };
    },
    components: {
        ValidationObserver,
        ValidationProvider,
    },
    methods: {
        async login() {
            if (await this.errors()) {
                let data = {
                    email: this.email,
                    password: this.password
                };
                axios('/api/auth', {
                    params: data
                }).then(res => {
                    if (res.status == 200) {
                        Extends.SetToken(res.data.access_token)
                        this.setUpToken(res.data.access_token);
                        this.$emit("Auth", true);
                    }
                    if (res.status == 202) {
                        Swal.fire("Chưa được xác thực!", "Thông tin tài khoản chưa đúng!", "warning");
                    }
                });
            }
        },
        async errors() {
            return await this.$refs['errors'].validate();
        },
        setUpToken(token) {
            axios.defaults.headers.common = {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + token
            };
        }
    }
}
</script>

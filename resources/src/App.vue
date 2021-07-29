<template>
<div>
    <div v-if="auth == 0" class="loaddings"></div>
    <div v-if="auth == 1" class="loaddings">
        <Login @Auth="AuthEmit($event)" />
    </div>
    <vue-progress-bar></vue-progress-bar>
    <HeaderMobile />
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-row flex-column-fluid page">
            <Sidebar />
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <Header />
                <RouterView />
                <Footer />
            </div>
        </div>
    </div>
</div>
</template>

<script>

import Login from "./components/Auth/login";
import Header from "./layout/Header";
import HeaderMobile from "./layout/HeaderMobile";
import Footer from "./layout/Footer";
import Sidebar from "./layout/Sidebar";
import Extends from './extend';

export default {
    name: "App",
    components: {
        Header,
        HeaderMobile,
        Footer,
        Sidebar,
        Login
    },
    data() {
        return {
            auth: 0
        }
    },
    created() {
        if (Extends.Auth()) {
            try 
            {
                axios('/api/auth/user').then(response => {
                    if(response.status == 200)
                    {
                        this.auth = 2
                    }
                    else {
                        this.auth = 1
                    }
                })    
            } 
            catch (error) {
                this.auth = 1
            }
        }

        axios.interceptors.request.use(config => {
            this.$Progress.start();
            return config;
        });

        axios.interceptors.response.use(response => {
            this.$Progress.finish();
            return response;
        }, error => {
            Swal.fire("Rất Tiếc!", "Đã có sự cố đã sảy ra, vui lòng thử lại sau!", "error");
            return error;
        });
        this.$Progress.start()
        this.$router.beforeEach((to, from, next) => {
            if (to.meta.progress !== undefined) {
                let meta = to.meta.progress
                this.$Progress.parseMeta(meta)
            }
            this.$Progress.start()
            next()
        })
        this.$router.afterEach((to, from) => {
            this.$Progress.finish()
        });
    },
    mounted() {
        this.$Progress.finish()
    },
    methods: {
        AuthEmit(status) {
            this.auth = 2
            this.$router.push('/')
        }
    },
}
</script>
<style>
    .loaddings {
        z-index: 100;
        position: fixed;
        background: white;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
    }
</style>

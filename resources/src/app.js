import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';
import App from './App.vue';
import VueProgressBar from 'vue-progressbar';
window.axios = require('axios');

Vue.use(VueProgressBar, {
    color: '#3699ff',
    failedColor: 'red',
    thickness: '2px',
    autoRevert: true,
    location: 'top',
    inverse: false,
    transition: {
        speed: '0.2s',
        opacity: '0.6s',
        termination: 300
    }
})

Vue.use(VueRouter);

const router = new VueRouter({ routes, mode: 'history' });

new Vue({
    el: '#__app',
    render: h => h(App),
    router
});
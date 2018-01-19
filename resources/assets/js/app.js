require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import Login from './components/Login.vue';
import Dashboard from './components/Dashboard.vue';

Vue.use(VueRouter);

// Vue.http.headers.common['X-CSRF-TOKEN'] = document.getElementsByName('csrf-token')[0].getAttribute('content');
// Vue.http.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('id_token');
// Vue.http.options.root = 'http://laravel.dev:8080';

Vue.component('navigation',require('./components/Navigation.vue'));

export default Vue;

export var router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '',
            name: 'login',
            component: Login
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard
        },
    ]
});

const app = new Vue({
    el: '#app',
    router: router
});
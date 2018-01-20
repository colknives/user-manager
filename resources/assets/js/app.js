require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import Login from './components/Login.vue';
import Dashboard from './components/Dashboard.vue';
import AddUser from './components/AddUser.vue';
import UpdateUser from './components/UpdateUser.vue';
import Main from './components/Main.vue';

Vue.use(VueRouter);

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
            path: '/user',
            component: Main,
            children: [
                {
                    path: '/dashboard',
                    name: 'dashboard',
                    component: Dashboard
                },
                {
                    path: '/user',
                    name: 'add-user',
                    component: AddUser
                },
                {
                    path: '/user/:id',
                    name: 'update-user',
                    component: UpdateUser
                }
            ]
        }
    ]
});


export var headers = { 
    Authorization: "Bearer " + localStorage.getItem('token'),
    Accept: "application/json"       
};

const app = new Vue({
    el: '#app',
    router: router
});
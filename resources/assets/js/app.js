
let model  = window.ajt_model;
let userId = window.currUser; 

// app.model = model;
require('./bootstrap');

window.Vue = require('vue');

import axios from 'axios';

// axios.defaults.baseURL = 'http://192.168.43.204/'; use when connected to phone

axios.defaults.baseURL = 'http://localhost:8000/';

import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

// Import Components
import BookComponent    from './components/BookComponent.vue';
import ConfirmComponent from './components/ConfirmComponent.vue';

// Vue.component('booking', BookComponent);

const routes = [
    {
        path: '/',
        component: BookComponent,
        name: 'bookBus',
        meta: {
            mdata: model,
            userId: userId 
        },
    },
    {
        path: '/confirm/:bookId',
        component: ConfirmComponent,
        name: 'confirmBook',
        // beforeEnter (to, from, next) {
        //     alert('hello world');
        //     next();
        // }
    }

]

const router = new VueRouter({ routes });

const app = new Vue(
    { 
        router,
        data: {
            model: {}
        },
        mounted () {
            // console.log(model)
        }
}).$mount('#app')

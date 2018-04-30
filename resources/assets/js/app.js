
let model  = window.ajt_model;
let userId = window.currUser; 

// app.model = model;
require('./bootstrap');

window.Vue = require('vue');

import axios from 'axios';

// axios.defaults.baseURL = 'http://192.168.43.204/'; use when connected to phone

axios.defaults.baseURL = window.url;

import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

// Import Components
import BookComponent    from './components/BookComponent.vue';
import ConfirmComponent from './components/ConfirmComponent.vue';
import PayComponent from './components/PayComponent.vue';

Vue.component('booker',BookComponent);



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
    },
    {
        path: 'payment/:bookRef',
        component: PayComponent,
        name: 'payNow',
    }

]

const router = new VueRouter({ 
    routes,
    // mode: 'history',
});

const app = new Vue(
    { 
        router,
}).$mount('#app')

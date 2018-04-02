
require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';

window.Vue.use(VueRouter);
// Import Components
import BookComponent from './components/BookComponent.vue';


const routes = [
    {
        path: '/',
        component: BookComponent,
        name: 'bookBus'
    }

]

const router = new VueRouter({ routes });

const app = new Vue(
    { 
        router 
    }).$mount('#app')

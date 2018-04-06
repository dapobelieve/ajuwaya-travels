
require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

// Import Components
import BookComponent    from './components/BookComponent.vue';
import ConfirmComponent from './components/ConfirmComponent.vue';


const routes = [
    {
        path: '/',
        component: BookComponent,
        name: 'bookBus'
    },
    {
        path: '/confirm/:bookId',
        component: ConfirmComponent,
        name: 'confirmBook',
        beforeEnter (to, from, next) {
            alert('hello world');
        }
    }

]

const router = new VueRouter({ routes });

router.beforeEach((to, from, next) => {

    next();
});



const app = new Vue(
    { 
        router 
    }).$mount('#app')

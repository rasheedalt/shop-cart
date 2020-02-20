
import axios from 'axios'
//import VueRouter from 'vue-router'


import './bootstrap'

window.Vue = require('vue');

//Vue.use(VueRouter);
Vue.use(axios);



axios.defaults.baseURL = 'https://shope-api.herokuapp.com/api';
//axios.defaults.headers.common['Authorization'] = '';


import App from './App.vue';


Vue.component('App', App);


// const router = new VueRouter({
//     mode: 'history',
//     routes: [ 
//         { path: '/',           redirect: { name: 'login'} },
//         { path: '/login',      component: Login, name: 'login' },
//         { path: '/dashboard', component: Dashboard, name: 'dashboard'},
//         { path: '*',          component: ErrorPage},
//         ]
// });


//Vue.router = router


const app = new Vue({
    el: '#app',
    components:{
        App
    },
    //router,
    //store
});

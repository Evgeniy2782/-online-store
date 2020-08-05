require('./bootstrap');

//import Lang from './lang';

import route from "./route";
import VueRouter from 'vue-router';
import router from "./router";
import Paginate from 'vuejs-paginate'
//import App from "./components/App";

window.Vue = require('vue');
Vue.use(VueRouter);
Vue.component('paginate', Paginate);

 new Vue({
    el: '#app',
   // render: h => h(Products),
    router
});




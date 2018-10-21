
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('myheader', require('./components/Myheader.vue'));
Vue.component('myfooter', require('./components/Myfooter.vue'));
// Vue.component('home', require('./components/Home.vue'));
// Vue.component('about', require('./components/About.vue'));

const home = require('./components/Home.vue');

const about = require('./components/About.vue');



const routes = [
    { path: '/home', component: home },
    { path: '/about', component: about }
  ]

const router = new VueRouter({
    //mode:'history',
routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
    router,
    components:{home,about}
});

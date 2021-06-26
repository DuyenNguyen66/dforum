/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';
import store from './store';
import router from './router';
import Main from './Main.vue';

window.Vue = require('vue');
Vue.router = router;
axios.defaults.withCredentials = true
axios.defaults.baseURL = 'http://dd-forum.test';

const app = new Vue({
    store,
    router,
    el: '#app',
    render: h => h(Main),
});
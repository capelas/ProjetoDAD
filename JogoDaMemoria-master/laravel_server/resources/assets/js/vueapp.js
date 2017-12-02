/*jshint esversion: 6 */

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
//import VueSocketio from 'vue-socket.io';

Vue.use(VueRouter);

//Vue.use(VueSocketio, 'http://192.168.10.10:8080');
//Vue.use(VueSocketio, 'http://192.168.10.1:8080');

const game = Vue.component('game',require('./components/Example.vue'));

const routes = [
  { path: '/', redirect: '/game' },
  { path: '/game', component: game }
];

const router = new VueRouter({
  routes:routes
});

const app = new Vue({
  router,
  data:{
    //player1:undefined,
    //player2: undefined,
    //departments: [],
  }
}).$mount('#app');
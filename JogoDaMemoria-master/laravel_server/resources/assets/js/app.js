/*jshint esversion: 6 */

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



 require('./bootstrap.js');

 window.Vue = require('vue');

 import VueRouter from 'vue-router';
// import VueSocketio from 'vue-socket.io';

Vue.use(VueRouter);

//Vue.use(VueSocketio, 'http://192.168.10.10:8080');
//Vue.use(VueSocketio, 'http://192.168.10.1:8080');


//users
const user = Vue.component('user', require('./components/user.vue'));
const login = Vue.component('login', require('./components/login.vue'));
//game
const singleplayer_memorygame = Vue.component('singlegame',require('./components/singleplayer_memorygame.vue'));

//piece
//
const imagem = Vue.component('imagem', require('./components/image.vue'));

const routes = [
	{ path: '/', redirect: '/users'},
	{ path: '/users', component: user},
	{ path: '/singlememorygame', component: singleplayer_memorygame },
	{ path: '/image', component: imagem},
	{ path: '/login', component: login}
];

const router = new VueRouter({
	routes:routes
});

const app = new Vue({
	router,
	data:{
		player1:undefined,
		player2: undefined,
		images: []
	}
}).$mount('#app');
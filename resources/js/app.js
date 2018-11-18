
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

// vueの練習（ドットインストール）
Vue.component('vue0-component', require('./components/Vue0Component.vue'));
Vue.component('vue1-component', require('./components/Vue1Component.vue'));
Vue.component('vue2-component', require('./components/Vue2Component.vue'));
Vue.component('vue3-component', require('./components/Vue3Component.vue'));
Vue.component('vue4-component', require('./components/Vue4Component.vue'));
Vue.component('vue5-component', require('./components/Vue5Component.vue'));
Vue.component('vue6-component', require('./components/Vue6Component.vue'));
Vue.component('vue7-component', require('./components/Vue7Component.vue'));

const app = new Vue({
    el: '#app'
});

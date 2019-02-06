
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('select2')

window.Vue = require('vue');
// Element UIの導入・使用
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
import locale from 'element-ui/lib/locale/lang/ja'

Vue.use(ElementUI, { locale })

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
Vue.component('vue8-component', require('./components/Vue8Component.vue'));
Vue.component('vue9-component', require('./components/Vue9Component.vue'));

// その他練習用ファイル
Vue.component('aiko-pony', require('./components/AikoPony.vue'));
Vue.component('love-like-pop', require('./components/LoveLikePop.vue'));
Vue.component('baby-peenats', require('./components/BabyPeenats.vue'));
// コントローラーからの変数を渡す
Vue.component('love-like-rock', require('./components/LoveLikeRock.vue'));
// コントローラーからの変数を渡す
Vue.component('to-do-list-part1', require('./components/ToDoListPart1.vue'));

const app = new Vue({
    el: '#app'
    ,
    // 親要素に仕込んであるプロパティ？に対して設定する為、ここに記述する。
    data() {
        return {
            // data で total を保持。
            total: 0
        }
    },
    methods: {
        // total を +1 するような methods。
        incrementTotal: function() {
            this.total++;
        },
    }
});

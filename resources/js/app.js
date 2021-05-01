require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue';
import store from './store/index';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

Vue.use(ElementUI);


Vue.component('create-post', require('./components/CreatePost.vue').default);
Vue.component('all-posts', require('./components/AllPosts.vue').default);
Vue.component('create-item', require('./components/CreateItem.vue').default);
Vue.component('all-items', require('./components/AllItems.vue').default);

const app = new Vue({
    store,
    el: '#app',
});

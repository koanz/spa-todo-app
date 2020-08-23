require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import {routes} from './routes';
import StoreData from './store';
import 'materialize-css/dist/css/materialize.min.css';
import 'material-design-icons/iconfont/material-icons.css';
import M from 'materialize-css';
import MainApp from './components/MainApp.vue';
import {init} from './helpers/general';

Vue.use(VueRouter);
Vue.use(Vuex);

const store = new Vuex.Store(StoreData);

const router = new VueRouter({
    routes,
    // mode: 'history'
});

init(store, router);

const app = new Vue({
    el: '#app',
    router,
    store,
    M,
    components: {
        MainApp
    }
});

/*
 * Copyright (c) 2018. Jake Toolson
 */

window._ = require('lodash');
window.$ = window.jQuery = require('jquery');
require('bootstrap');

import Vue from 'vue';
import App from './App'
import router from './router'
import ApiService from './common/api.service';
import store from './store';
import {SET_WAITING} from './store/mutation.types';
import { sync } from 'vuex-router-sync'

const unsync = sync(store, router);

ApiService.init();


// FIXME: Is this the right place to set loading?
router.beforeEach((to, from, next) => {
    store.commit(SET_WAITING);
    next();
});
// router.afterEach((to, from) =>{
//     // store.commit('toggleLoading', false);
// });


new Vue({
    el: '#app',
    router,
    store,
    template: '<App/>',
    components: {
        App
    }
});

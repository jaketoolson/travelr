/*
 * Copyright (c) 2018. Jake Toolson
 */

window._ = require('lodash');
window.$ = window.jQuery = require('jquery');
require('bootstrap');

import Vue from 'vue';
import router from './router'
import ApiService from './common/api.service';
import store from './store';
import { SET_WAITING } from './store/mutation.types';
import { sync } from 'vuex-router-sync';
import { VueExtendLayout, layout } from 'vue-extend-layout';

Vue.use(VueExtendLayout);
sync(store, router);

ApiService.init();


// FIXME: Is this the right place to set loading in this context?
router.beforeEach((to, from, next) => {
    store.commit(SET_WAITING);
    next();
});
// router.afterEach((to, from) =>{
//     store.commit(NOT_WAITING);
// });


new Vue({
    el: '#app',
    router,
    store,
    ...layout,
    template: '<App/>',
});

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

ApiService.init();

new Vue({
    el: '#app',
    router,
    template: '<App/>',
    components: {
        App
    }
});

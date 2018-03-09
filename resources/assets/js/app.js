
window._ = require('lodash');
window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');
window.axios = require('axios');
require('bootstrap');
require('selectize');
require('masonry-layout');
require('icheck');
require('jquery-validation');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
let token = document.head.querySelector('meta[name="csrf-token"]');
window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;

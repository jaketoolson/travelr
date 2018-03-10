
window._ = require('lodash');
window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');
require('bootstrap');
require('selectize');
require('masonry-layout');
require('icheck');
require('jquery-validation');

import test from './components/PlanetsListings.vue';

new Vue({
    el: '#test',
    components: {
        'test': test
    },
});

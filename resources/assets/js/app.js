
/*
 * Copyright (c) Jake Toolson 2018.
 */

window._ = require('lodash');
window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');
require('bootstrap');
require('selectize');
require('masonry-layout');
require('icheck');
require('jquery-validation');

import planet_listings from './components/planet/PlanetsListings';
import search_bar from './components/search/SearchBar';

new Vue({
    el: '#content',
    components: {
        'planet-listings': planet_listings,
        'search-bar': search_bar
    },
});

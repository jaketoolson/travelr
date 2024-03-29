/*
 * Copyright (c) 2018. Jake Toolson
 */

import Vue from 'vue';
import routes from '@/router/routes';
import VueRouter from 'vue-router';

import qs from 'qs';

Vue.use(VueRouter);

let router = new VueRouter({
    mode: 'history',
    routes: routes,
    scrollBehavior (to, from, savedPosition) {
        return { x: 0, y: 0 }
    },

    // TODO: query parameters with non numeric indexes are encoded by default, this disables encoding.
    // stringifyQuery(query) {
    //     let result = qs.stringify(query, {encode: false});
    //
    //     return result ? ('?' + result) : '';;
    // }
});

export default router;

export const getRouteObjectByName = (name) => {
    return router.resolve({
        name: name
    });
};

export const getRouteByName = (name, params) => {
    let route = router.resolve({
        name: name,
        params: params
    });

    return route ? route.href : null;
};
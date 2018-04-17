/*
 * Copyright (c) 2018. Jake Toolson
 */

import Home from '../views/Home';
import SearchResults from '../components/search/SearchResults';

export default [
    {
        path: '/',
        component: Home,
        name: 'home',
    },
    {
        path: '/api',
        children : [
            {
                path: 'planets',
                name: 'api.planets'
            },
            {
                path: 'galaxies',
                name: 'api.galaxies'
            },
            {
                path: 'amenities',
                name: 'api.amenities'
            },
        ],
    },
    {
        path: '/planets',
        name: 'planets',
        component: SearchResults,
    },
    {
        path: '/planets/:id',
        name: 'planets.show',
    },
    {
        path: '*',
        redirect: { name: 'home' }
    }
];
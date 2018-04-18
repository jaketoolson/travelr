/*
 * Copyright (c) 2018. Jake Toolson
 */

import Home from '@/views/Home';
import Planets from '@/views/Planets';
import Planet from '@/views/Planet';

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
                path: 'planets/:id',
                name: 'api.planets.show'
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
        component: Planets,
    },
    {
        path: '/planets/:id',
        name: 'planets.show',
        component: Planet
    },
    {
        path: '*',
        redirect: { name: 'home' }
    }
];
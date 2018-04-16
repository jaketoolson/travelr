/*
 * Copyright (c) 2018. Jake Toolson
 */

import http from '../router/axios'
import { getRouteByName } from '../router';

const ApiService = {
    init () {},
    get (resource, params) {
        return http.get(resource, params)
            .catch((error) => {
                throw new Error(`ApiService ${error}`)
            })
    },
};

export default ApiService;

// FIXME: Break these out.
export const GalaxiesService = {
    all () {
        return ApiService.get(getRouteByName('api.galaxies'));
    },
};

export const AmenitiesService = {
    all () {
        return ApiService.get(getRouteByName('api.amenities'));
    },
};
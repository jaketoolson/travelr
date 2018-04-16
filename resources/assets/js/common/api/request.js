/*
 * Copyright (c) 2018. Jake Toolson
 */

import http from '../../router/axios';
import {getRouteByName} from '../../router';

export const getAmenities = (params) => {
    return http.get(getRouteByName('api.amenities'), params);
};

export const getGalaxies = (params) => {
    return http.get(getRouteByName('api.galaxies'), params);
};

export const mapJsonToMultiselect = (data) => {
    let attributes = [];
    _.each(data, function (k){
        attributes.push({
            id : k.id,
            name : k.attributes.name
        });
    });

    return attributes;
};
/*
 * Copyright (c) 2018. Jake Toolson
 */

import { AmenitiesService, GalaxiesService } from "@/common/api.service";
import { GET_AMENITIES, GET_GALAXIES } from '@/store/action.types'
import { SET_AMENITIES, SET_GALAXIES, SET_ERROR } from "@/store/mutation.types";

const initialState = {
    amenities: [],
    galaxies: [],
    planet_name: null,
    error: {
        type: null,
        message: null,
    }
};

export const state = Object.assign({}, initialState);

export const actions = {
    [GET_GALAXIES] (context) {
        return GalaxiesService.all()
            .then(({ data }) => {
                context.commit(SET_GALAXIES, data);
                return data;
            });
    },
    [GET_AMENITIES] (context) {
        return AmenitiesService.all()
            .then(({ data }) => {
                context.commit(SET_AMENITIES, data);
                return data;
            });
    },
};

export const mutations = {
    [SET_GALAXIES] (state, galaxies) {
        state.galaxies = galaxies;
    },
    [SET_AMENITIES] (state, amenities) {
        state.amenities = amenities;
    },
    [SET_ERROR] (state, error) {
        state.error.type = error.type;
        state.error.message = error.message;
    }
};

const getters = {
    amenities (state) {
        return state.amenities;
    },
    galaxies (state) {
        return state.galaxies;
    },
    error (state) {
        return state.error;
    }
};

export default {
    state,
    actions,
    mutations,
    getters
};

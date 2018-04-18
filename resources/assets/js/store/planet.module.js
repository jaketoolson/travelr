/*
 * Copyright (c) 2018. Jake Toolson
 */

import { GET_PLANET } from '@/store/action.types'
import {SET_PLANET } from "@/store/mutation.types";
import {PlanetsService} from "@/common/api.service";

const initialState = {
    planet: {
        type: null,
        id: null,
        attributes: {},
    },
};

export const state = Object.assign({}, initialState);

export const actions = {
    [GET_PLANET] (context, id) {
        return PlanetsService.get(id)
            .then(({ data }) => {
                context.commit(SET_PLANET, data);
                return data;
            });
    },

};

export const mutations = {
    [SET_PLANET] (state, planet) {
        state.planet = planet;
    },
};

const getters = {
    planet (state) {
        return state.planet
    },
};

export default {
    state,
    actions,
    mutations,
    getters
};

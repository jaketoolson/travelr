/*
 * Copyright (c) 2018. Jake Toolson
 */

import { PlanetsService } from "../common/api.service";
import { QUERY_PLANETS } from './action.types'
import { SET_PLANETS_QUERY, SET_PLANETS } from "./mutation.types";

const initialState = {
    query: {},
    planets: [],
};

export const state = Object.assign({}, initialState);

export const actions = {
    [QUERY_PLANETS] (context, params) {
        return PlanetsService.query(params)
            .then(({ data }) => {
                context.commit(SET_PLANETS, data);
                return data;
            });
    },
};

export const mutations = {
    [SET_PLANETS_QUERY] (state, query) {
        state.query = query;
    },
    [SET_PLANETS] (state, planets) {
        state.planets = planets;
    },
};

const getters = {
    planets (state) {
        return state.planets;
    },
    query (state) {
        return state.query;
    },
};

export default {
    state,
    actions,
    mutations,
    getters
};

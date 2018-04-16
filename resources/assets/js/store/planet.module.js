/*
 * Copyright (c) 2018. Jake Toolson
 */

import { GET_PLANET } from './action.types'
import { SET_PLANET } from "./mutation.types";

const initialState = {
    planet: {
        type: null,
        id: null,
        attributes: {},
    },
};

export const state = Object.assign({}, initialState);

export const actions = {
    [GET_PLANET] (context, planetId, ) {
        context.commit(SET_PLANET, planetId);
    },
};

export const mutations = {};

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

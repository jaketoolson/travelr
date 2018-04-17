/*
 * Copyright (c) 2018. Jake Toolson
 */

import Vue from 'vue';
import Vuex from 'vuex';
import planet from './planet.module';
import home from './home.module';
import searchplanets from './searchplanets.module';
import { SET_WAITING, NOT_WAITING, NOT_LOADED, SET_LOADED } from './mutation.types';

Vue.use(Vuex);

const initialState = {
    waiting: true,
    loaded: false,
};

export const state = Object.assign({}, initialState);

export default new Vuex.Store({
    modules: {
        home,
        planet,
        searchplanets
    },
    state: initialState,
    mutations: {
        [SET_WAITING] (state) {
            state.waiting = true;
        },
        [NOT_WAITING] (state) {
            state.waiting = false;
        },
        [SET_LOADED] (state) {
            state.loaded = true;
        },
        [NOT_LOADED] (state) {
            state.loaded = false;
        },
    },
    actions: {},
    getters: {
        waiting: state => state.waiting,
        loaded: state => state.loaded,
    },
});
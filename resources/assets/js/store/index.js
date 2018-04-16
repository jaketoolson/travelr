/*
 * Copyright (c) 2018. Jake Toolson
 */

import Vue from 'vue';
import Vuex from 'vuex';
import { SET_WAITING, NOT_WAITING } from './mutation.types';

Vue.use(Vuex);

const initialState = {
    waiting: true,
};

export const state = Object.assign({}, initialState);

export default new Vuex.Store({
    state: initialState,
    mutations: {
        [SET_WAITING] (state) {
            state.waiting = true;
        },
        [NOT_WAITING] (state) {
            state.waiting = false;
        },
    },
    actions: {},
    getters: {
        waiting: state => state.waiting,
    },
});
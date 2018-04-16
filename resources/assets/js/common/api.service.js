/*
 * Copyright (c) 2018. Jake Toolson
 */

import http from '../router/axios'

const ApiService = {
    init () {

    },

    query (resource, params) {
        return http
            .get(resource, params)
            .catch((error) => {
                throw new Error(`ApiService ${error}`)
            })
    },
};

export default ApiService;
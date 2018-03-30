/*
 * Copyright (c) Jake Toolson 2018.
 */

import spinner from "../../common/spinner";
import PlanetListing from "./PlanetListing";
import {filters} from '../../common/mixins';

export default {
    mixins: [
        filters,
    ],
    props: {
        display_per_row: {
            type: String,
            default: '3',
            validator: value => {
                value = parseInt(value);
                return value > 0 && value < 5;
            },
        },
        display_type: {
            type: String,
            default: 'grid',
            validator: value => {
                return _.indexOf(['grid', 'list'], value) > -1;
            },
        },
    },
    data() {
        return {
            active_display_type : this.display_type
        }
    },
    components: {
        'spinner' : spinner,
        'planet-listing' : PlanetListing
    },
};
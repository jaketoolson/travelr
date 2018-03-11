import spinner from "../../common/spinner";
import PlanetListing from "./PlanetListing";
import {filters} from '../../common/mixins';

export default {
    mixins: [
        filters,
    ],
    props: {
        planets_endpoint: {
            type: String,
            required: true
        },
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
        }
    },
    components: {
        'spinner' : spinner,
        'planet-listing' : PlanetListing
    },
};
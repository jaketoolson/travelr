<!--
  - Copyright (c) Jake Toolson 2018.
  -->

<template>
    <div :class="`items grid-xl-${display_per_row}-items grid-lg-${display_per_row-1}-items grid-md-2-items ${display_type}`">
        <spinner v-if="!ready"></spinner>
        <div v-else v-for="item in items" :key="item.id">
            <planet-listing :item="item"></planet-listing>
        </div>
    </div>
</template>

<script>
    import {http} from '../../common/axios';
    import listing_mixin from './listing-mixin';
    export default {
        mixins: [
            listing_mixin
        ],
        data() {
            return {
                ready : false,
                items : [],
            }
        },
        methods: {
            fetchPlanets() {
                http.get(this.planets_endpoint).then(response => {
                    this.items = response.data;
                    this.$nextTick(function () {
                        this.ready = true;
                    });
                }).catch(e => {

                })
            }
        },
        updated() {
            // this.ready = true;
        },
        mounted() {
            this.fetchPlanets();
        },
    }
</script>

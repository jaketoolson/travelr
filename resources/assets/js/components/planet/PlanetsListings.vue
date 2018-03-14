<!--
  - Copyright (c) Jake Toolson 2018.
  -->

<template>
    <div>
        <spinner v-if="!ready"></spinner>
        <div v-else class="section-title clearfix">
            <div  class="float-xl-left float-md-left float-sm-none">
                <slot name="section_title"></slot>
            </div>
            <div class="float-right d-xs-none thumbnail-toggle">
                <slot name="section_toggles" slot-scope="props">
                    <a href="javascript:void(0)"
                       :class="[{ active: active_display_type === 'grid' }, ' change-class ']"
                       @click.prevent="toggleDisplayType('grid')"
                    >
                        <i class="fa fa-th"></i>
                    </a>
                    <a href="javascript:void(0)"
                       :class="[{ active: active_display_type === 'list' }, ' change-class ']"
                       @click.prevent="toggleDisplayType('list')"
                    >
                        <i class="fa fa-th-list"></i>
                    </a>
                </slot>
            </div>
        </div>
        <div :class="`items grid-xl-${display_per_row}-items grid-lg-${display_per_row-1}-items grid-md-2-items ${active_display_type}`">
            <div v-for="item in items" :key="item.id">
                <planet-listing :item="item"></planet-listing>
            </div>
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
        props : {
            planets_endpoint: {
                type: String,
                required: true
            },
        },
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
                        this.$emit('request.completed');
                        this.ready = true;
                        window.dispatchEvent(new Event('resize'));
                    });
                }).catch(e => {

                })
            },
            toggleDisplayType(displayType) {
                if (_.indexOf(['list', 'grid'], displayType) === -1) {
                    displayType = 'list';
                }
                this.active_display_type = displayType;
            },
        },
        updated() {
            // this.ready = true;
        },
        mounted() {
            this.fetchPlanets();
            this.toggleDisplayType(this.display_type);
        },
    }
</script>

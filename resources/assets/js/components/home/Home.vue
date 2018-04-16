<!--
  - Copyright (c) 2018. Jake Toolson
  -->
<template>
    <section class="home-search">
        <div class="inner">
            <div class="container">
                <h1 class="mb-5 slideInLeft text-white animated">
                    <span class="text-primary mr-2">
                        <i class="fas fa-rocket"></i>
                    </span>
                    Vacation anywhere in the universe.
                </h1>
                <transition name="fade">
                <div v-if="loaded" class="main-search-form form">
                    <div class="form-row">
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <input id="planet_name" v-on:keyup.enter="searchPlanets" v-model="fields.planet_name" name="planet_name" type="text" class="form-control form-control-xl" placeholder="Search by planet name">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group">
                                <multiselect
                                        v-model="fields.galaxy"
                                        track-by="name"
                                        label="name"
                                        placeholder="Select galaxy"
                                        :options="galaxies"
                                        :searchable="false"
                                        :max-height="600"
                                        :show-labels="false"
                                        :allow-empty="true">
                                </multiselect>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group multiselect-multiple-single">
                                <multiselect
                                        v-model="fields.amenities"
                                        track-by="name"
                                        label="name"
                                        placeholder="Select amenities"
                                        :multiple="true"
                                        :limit="0"
                                        :options="amenities"
                                        :searchable="false"
                                        :max-height="600"
                                        :show-labels="false"
                                        :allow-empty="true">
                                </multiselect>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <button
                                    type="button"
                                    @click.prevent="searchPlanets"
                                    class="btn btn-xl btn-primary btn-block">Search</button>
                        </div>
                    </div>
                </div>
                </transition>
            </div>

        </div>
    </section>
</template>
<script>
    import { mapGetters } from 'vuex';
    import store from '../../store';
    import Multiselect from '../Multiselect'
    import { SET_WAITING, NOT_WAITING, SET_LOADED } from '../../store/mutation.types';
    import { GET_GALAXIES, GET_AMENITIES } from "../../store/action.types";

    export default {
        data() {
            return {
                fields: {
                    planet_name: null,
                    galaxy : null,
                    amenities : [],
                },
            }
        },
        computed: {
            ...mapGetters([
                'loaded'
            ]),
            galaxies() {
                return this.mapJsonToMultiselect(this.$store.getters.galaxies.data);
            },
            amenities() {
                return this.mapJsonToMultiselect(this.$store.getters.amenities.data);
            }
        },
        methods: {
            // TODO: Make this work ;)
            searchPlanets() {
                let data = {
                    'filter[galaxy_id]': this.fields.galaxy ? this.fields.galaxy.id : null,
                    'filter[name]': this.fields.planet_name,
                    'filter[amenities]': this.fields.amenities ? this.fields.amenities.map(function (amenity) {
                        return amenity.id;
                    }).join(',') : null
                };

                this.$store.commit(SET_WAITING);

                // this.$router.push({name: 'planets', query: data});
            },
            mapJsonToMultiselect(data) {
                let attributes = [];
                _.each(data, function (k){
                    attributes.push({
                        id : k.id,
                        name : k.attributes.name
                    });
                });

                return attributes;
            }
        },
        mounted() {
            Promise.all([
                store.dispatch(GET_GALAXIES),
                store.dispatch(GET_AMENITIES)
            ]).then((data) => {
                this.$store.commit(SET_LOADED);
                this.$store.commit(NOT_WAITING);
            });
        },
        components: {
            Multiselect,
        },
    }
</script>
<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity 0.8s ease-out;
    }

    .fade-enter, .fade-leave-to {
        opacity: 0;
        transition: opacity 0.8s ease-out;
    }
</style>

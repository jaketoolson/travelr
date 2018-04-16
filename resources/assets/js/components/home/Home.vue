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
                <div v-if="ready" class="main-search-form form">
                    <div class="form-row">
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <input id="planet_name" v-on:keyup.enter="searchPlanets" v-model="fields.planet_name" name="planet_name" type="text" class="form-control form-control-lg" placeholder="Search by planet name">
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
                                    class="btn btn-primary btn-block">Search</button>
                        </div>
                    </div>
                </div>
                </transition>
            </div>

        </div>
    </section>
</template>
<script>
    import { getAmenities, getGalaxies, mapJsonToMultiselect } from '../../common/api/request';
    import SearchResults from '../search/SearchResults';
    import Multiselect from '../Multiselect'
    import {NOT_WAITING} from '../../store/mutation.types';
    export default {
        data() {
            return {
                ready : false,
                searching : false,
                foundPlanets : [],
                amenities : [],
                galaxies : [],
                fields: {
                    planet_name: null,
                    galaxy : null,
                    amenities : [],
                },
            }
        },
        methods: {
            searchPlanets() {
                this.searching = true;

                let data = {
                    'filter[galaxy_id]': this.fields.galaxy ? this.fields.galaxy.id : null,
                    'filter[name]': this.fields.planet_name,
                    'filter[amenities]': this.fields.amenities ? this.fields.amenities.map(function (amenity) {
                        return amenity.id;
                    }).join(',') : null
                };
                this.$router.push({name: 'planets', query: data});
            },
        },
        mounted() {
            getAmenities().then(response => {
                this.amenities = mapJsonToMultiselect(response.data.data);
                return getGalaxies().then(response => {
                    this.galaxies = mapJsonToMultiselect(response.data.data);
                });
            }).then(response => {
                this.ready = true;
                this.$store.commit(NOT_WAITING);
            });
        },
        components: {
            Multiselect,
            'search-result' : SearchResults
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

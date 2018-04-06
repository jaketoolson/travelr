<!--
  - Copyright (c) Jake Toolson 2018.
  -->

<template>
    <div class="main-search-form">
        <div class="form-row">
            <div class="col-md-4 col-sm-4">
                <div class="form-group">
                    <label for="what" class="col-form-label" >Name?</label>
                    <input v-on:keyup.enter="searchPlanets" v-model="fields.planet_name" name="keyword" type="text" class="form-control" id="name" placeholder="What planet are you looking for?">
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-group">
                    <label class="col-form-label">Galaxy?</label>
                    <multiselect
                            v-model="fields.galaxy"
                            track-by="name"
                            label="name"
                            placeholder="Select Galaxy"
                            :options="fields.galaxies"
                            :searchable="false"
                            :max-height="600"
                            :show-labels="false"
                            :allow-empty="false">
                    </multiselect>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <button
                        type="button"
                        @click.prevent="searchPlanets"
                        class="btn btn-primary width-100">Search</button>
            </div>
        </div>
        <spinner v-if="searching"></spinner>
        <search-result v-else :items="foundPlanets"></search-result>
    </div>
</template>

<script>
    import spinner from "../../common/spinner";
    import SearchResults from './SearchResults';
    import {http} from '../../common/axios';
    import Multiselect from 'vue-multiselect'
    export default {
        props: {
            galaxies_endpoint: {
                type: String,
                required: true
            },
            planets_search_endpoint : {
                type: String,
                required: true
            },
        },
        data() {
            return {
                ready : false,
                searching : false,
                foundPlanets : [],
                fields: {
                    planet_name: null,
                    galaxies : [],
                    galaxy : null,
                },
            }
        },
        methods: {
            fetchGalaxies() {
                http.get(this.galaxies_endpoint).then(response => {
                    this.fields.galaxies = response.data.data;
                    this.$nextTick(function () {
                        this.$emit('request.completed');
                        this.ready = true;
                    });
                }).catch(e => {

                })
            },
            searchPlanets() {
                this.searching = true;

                let data = {
                    params: {
                        galaxy_id : this.fields.galaxy ? this.fields.galaxy.id : null,
                        planet_name : this.fields.planet_name
                    }
                };

                http.get(this.planets_search_endpoint, data).then(response => {
                    this.foundPlanets = response.data.data;
                }).catch(e => {}).then(()=>{
                    this.$nextTick(function () {
                        this.searching = false;
                    });
                });
            },
        },
        mounted() {
            this.fetchGalaxies();
        },
        components: {
            Multiselect,
            'spinner' : spinner,
            'search-result' : SearchResults
        },
    }
</script>

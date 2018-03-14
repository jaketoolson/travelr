<!--
  - Copyright (c) Jake Toolson 2018.
  -->

<template>
    <div class="main-search-form">
        <div class="form-row">
            <div class="col-md-3 col-sm-3">
                <div class="form-group">
                    <label for="what" class="col-form-label">What?</label>
                    <input name="keyword" type="text" class="form-control" id="what" placeholder="What are you looking for?">
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
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
            <div class="col-md-3 col-sm-3">
                <button
                        type="button"
                        @click.prevent="searchPlanets"
                        class="btn btn-primary width-100">Search</button>
            </div>
        </div>
        <search-result v-if="foundPlanets.length > 0" :items="foundPlanets"></search-result>
    </div>
</template>

<script>
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
                foundPlanets : {},
                fields: {
                    galaxies : [],
                    galaxy : null,
                },
            }
        },
        methods: {
            fetchGalaxies() {
                http.get(this.galaxies_endpoint).then(response => {
                    this.fields.galaxies = response.data;
                    this.$nextTick(function () {
                        this.$emit('request.completed');
                        this.ready = true;
                    });
                }).catch(e => {

                })
            },
            searchPlanets() {
                http.get(this.planets_search_endpoint).then(response => {
                    this.foundPlanets = response.data;
                }).catch(e => {

                })
            },
        },
        mounted() {
            this.fetchGalaxies();
        },
        components: {
            Multiselect,
            'search-result' : SearchResults
        },
    }
</script>

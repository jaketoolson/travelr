<!--
  - Copyright (c) 2018. Jake Toolson
  -->

<template>
    <div class="main-search-form form">
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
</template>
<script>
    import Multiselect from '../Multiselect';
    import { QUERY_PLANETS } from "../../store/action.types";

    export default {
        name: 'SearchPlanets',
        components: {
            Multiselect,
        },
        props: {
            galaxies: {
                type: Array,
                required: true,
            },
            amenities: {
                type: Array,
                required: true
            }
        },
        data() {
            return {
                searching: false,
                fields: {
                    planet_name: null,
                    galaxy: null,
                    amenities: [],
                },
            }
        },
        methods : {
            searchPlanets() {
                if (this.searching) {
                    return;
                }

                let data = {
                    'filter[galaxy_id]': this.fields.galaxy ? this.fields.galaxy.id : null,
                    'filter[name]': this.fields.planet_name,
                    'filter[amenities]': this.fields.amenities ? this.fields.amenities.map(function (amenity) {
                        return amenity.id;
                    }).join(',') : null
                };

                this.searching = true;
                this.$store.dispatch(QUERY_PLANETS, data).then((response)=>{
                    alert(`Found ${response.data.length} results.`);
                    this.searching = false;
                });
            },
        }
    }
</script>
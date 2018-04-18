<!--
  - Copyright (c) 2018. Jake Toolson
  -->
<template>
    <div class="container mt-5 mb-5">
        <div class="card" v-if="planet">
            <div class="card-img-header">
                <img class="card-img-top" :src="planet.data.relationships.photo.links.src">
                <button class="btn btn-light btn-photos">Photos</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-7">
                        <small class="text-muted text-xs text-uppercase">{{ planet.data.relationships.galaxy.meta.name }}</small>
                        <h1 class="card-title">{{ planet.data.attributes.name }}</h1>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <i class="fas fa-users"></i> Population <span class="text-muted">{{ population(planet.data.attributes.population) }}</span>
                            </li>
                            <li class="list-inline-item">
                                <i class="fas fa-sun"></i> Climate <span class="text-muted">{{ planet.data.attributes.climate }}</span>
                            </li>
                        </ul>
                        <hr>
                        <p class="card-text text-muted">{{ planet.data.attributes.description }}</p>
                        <hr>
                        <h5>Terrains</h5>
                        <div class="row">
                            <div class="col-md-6" v-for="terrain in terrains" :key="terrain.id">
                                <p class="text-muted">{{ terrain.attributes.name }}</p>
                            </div>
                        </div>
                        <hr>
                        <h5>Amenities</h5>
                        <div class="row">
                            <div class="col-md-6" v-for="amenity in amenities" :key="amenity.id">
                                <p class="text-muted">{{ amenity.attributes.name }}</p>
                            </div>
                        </div>
                        <hr>
                        <h5>
                            <review-stars :total="Math.ceil(planet.data.attributes.average_rating)"></review-stars>
                        </h5>
                    </div>
                    <div class="col-md-5">
                        <div class="card border">
                            <div class="card-body">
                                <p class="card-text">
                                    <strong>${{ planet.data.attributes.price_dollars }}</strong> per night
                                    <review-stars class="d-block" :total="Math.ceil(planet.data.attributes.average_rating)"></review-stars>
                                </p>
                                <div class="form-group mb-0 mt-3">
                                    <button class="btn-xl btn btn-block btn-primary">Book</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import { mapGetters } from 'vuex';
    import store from '@/store';
    import router from '@/router';
    import SearchResults from '@/components/search/SearchResults';
    import { GET_PLANET } from "@/store/action.types";
    import { NOT_WAITING } from "@/store/mutation.types";
    import ReviewStars from '@/components/ReviewStars'

    export default {
        name: 'Planets',
        data() {
            return {
                planet: null,
            }
        },
        beforeRouteEnter (to, from, next) {
            store.dispatch(GET_PLANET, to.params.id).then((data)=> {
                next((vm)=>{
                    vm.planet = data;
                });
            }).catch((r)=>{
                router.push({name: 'home'});
            })
        },
        computed : {
            amenities () {
                return _.sortBy(this.searchThroughIncluded('amenity'), 'attributes.name');
            },
            terrains () {
                return _.sortBy(this.searchThroughIncluded('terrain'), 'attributes.name');
            }
        },
        methods : {
            searchThroughIncluded (key) {
                return _.filter(this.planet.included, {type: key});
            },
            population (num) {
                if (num === null) {
                    return null;
                }
                if (num === 0) {
                    return 0;
                }
                let b = (num).toPrecision(2).split("e"),
                    k = b.length === 1 ? 0 : Math.floor(Math.min(b[1].slice(1), 14) / 3),
                    c = k < 1 ? num.toFixed(0) : (num / Math.pow(10, k * 3) ).toFixed(1),
                    d = c < 0 ? c : Math.abs(c),
                    e = d + ['', 'K', 'M', 'B', 'T'][k];

                return e;
            }
        },
        components: {
            SearchResults,
            ReviewStars,
        },
        updated () {
            store.commit(NOT_WAITING);
        }
    }
</script>
<style>
    .card-img-header {
        position: relative;
    }
    .card-img-top{
        width: 100%;
        height: 50vw;
        object-fit: cover;
    }
    .btn-photos {
        position: absolute;
        bottom: 20px;
        right: 20px;
    }
    .card.border {
        border: 1px solid #dee2e6 !important;;
    }
</style>

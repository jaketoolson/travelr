<!--
  - Copyright (c) 2018. Jake Toolson
  -->
<template>
    <div class="container mt-5 mb-5">
        <div class="card" v-if="planet">
            <div class="card-img-header">
                <img class="card-img-top" :src="planet.relationships.photo.links.src">
                <button class="btn btn-photos">Photos</button>
            </div>

            <div class="card-body">
                <small class="text-muted text-xs text-uppercase">{{ planet.relationships.galaxy.meta.name }}</small>
                <h2 class="card-title">{{ planet.attributes.name }}</h2>
                <p class="card-text text-muted">
                    <strong>${{ planet.attributes.price_dollars }} per night</strong>
                </p>
                <p class="card-text">{{ planet.attributes.description }}</p>
                <review-stars :total="Math.ceil(planet.attributes.average_rating)"></review-stars>
            </div>
            <hr>
            <div class="card-body">
                <dl class="row card-text">
                    <dt class="col-sm-3">Ammnities</dt>
                    <dd class="col-sm-9">
                        <p>Beach</p>
                        <p>Hot Tub</p>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</template>
<script>
    import { mapGetters } from 'vuex';
    import SearchResults from '@/components/search/SearchResults';
    import { GET_PLANET } from "@/store/action.types";
    import store from '@/store';
    import ReviewStars from '@/components/ReviewStars'
    import { NOT_WAITING } from "@/store/mutation.types";
    import router from '@/router';

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
        height: 30vw;
        object-fit: cover;
    }
    .btn-photos {
        position: absolute;
        bottom: 20px;
        right: 20px;
    }
</style>

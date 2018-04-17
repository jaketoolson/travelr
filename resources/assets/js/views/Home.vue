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
                    <SearchPlanets v-if="loaded" :galaxies="galaxies" :amenities="amenities"></SearchPlanets>
                </transition>
            </div>
        </div>
    </section>
</template>
<script>
    import { mapGetters } from 'vuex';
    import store from '../store';
    import { NOT_WAITING, SET_LOADED } from '../store/mutation.types';
    import { GET_GALAXIES, GET_AMENITIES } from "../store/action.types";
    import SearchPlanets from '../components/search/SearchPlanets';
    export default {
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
            SearchPlanets,
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
<!--
  - Copyright (c) 2018. Jake Toolson
  -->
<template>
    <div>
        <search-results v-if="!searching && planets.data.length > 0" :items="planets.data"></search-results>
        <transition v-else>
            <h3 class="center-of-screen text-white text-center">
                <template v-if="!searching && planets.data.length === 0">
                    Sorry, we were unable to find planets that meet your needs :(
                    <router-link to="/" class="d-block mt-3"><i class="fas fa-home"></i></router-link>
                </template>
                <template v-else>
                    Fueling up the tanks, and reviewing ignition plans...
                </template>
            </h3>
        </transition>
    </div>
</template>
<script>
    import { mapGetters } from 'vuex';
    import { QUERY_PLANETS } from "@/store/action.types";
    import { NOT_WAITING, SET_ERROR } from "@/store/mutation.types";
    import SearchResults from '@/components/search/SearchResults';

    export default {
        name: 'Planets',
        data() {
            return {
                searching: true,
                query: {},
                planets: {},
            }
        },
        components: {
            SearchResults,
        },
        mounted () {
            this.query = this.$route.query;

            this.$store.dispatch(QUERY_PLANETS, this.query).then((response)=>{
                this.planets = this.$store.getters.planets;
                this.$store.commit(NOT_WAITING);

                // if (this.planets.data.length === 0) {
                //     this.$store.commit(SET_ERROR, {
                //         type: 'error',
                //         message: 'Sorry, we were unable to find planets that meet your needs :('
                //     });
                //
                //     this.$router.push({ name: 'home'});
                // }

            }).finally(()=> this.searching = false );
        },
    }
</script>

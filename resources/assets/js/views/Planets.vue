<!--
  - Copyright (c) 2018. Jake Toolson
  -->
<template>
    <pre>{{ planets }}</pre>
</template>
<script>
    import { mapGetters } from 'vuex';
    import { QUERY_PLANETS } from "../store/action.types";
    import { NOT_WAITING } from "../store/mutation.types";

    export default {
        name: 'Planets',
        data() {
            return {
                query: {},
                planets: [],
            }
        },
        mounted () {
            this.query = this.$route.query;

            this.$store.dispatch(QUERY_PLANETS, this.query).then((response)=>{
                this.planets = this.$store.getters.planets;
                this.$store.commit(NOT_WAITING);
            });
        },
    }
</script>

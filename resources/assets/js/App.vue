<!--
  - Copyright (c) 2018. Jake Toolson
  -->
<template>
    <div id="app">
        <div id="loader" v-if="waiting" class="d-inline">
            <spinner color="#007bff" size="30px"></spinner>
        </div>
        <router-view></router-view>
    </div>
</template>
<script>
    import spinner from './common/spinner';
    import { mapGetters } from 'vuex'

    export default {
        name: 'App',
        computed: {
            ...mapGetters([
                'waiting'
            ])
        },
        components: {
            'spinner' : spinner,
        },
    }
</script>
<style>
    #loader {
        position: absolute;
        top: 15px;
        right: 15px;
        width: 30px;
        height: 30px;
        z-index: 9999;
    }
</style>
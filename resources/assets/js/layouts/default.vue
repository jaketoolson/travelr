<!--
  - Copyright (c) 2018. Jake Toolson
  -->
<template>
    <div id="app">
        <div id="loader" v-if="waiting" class="d-inline">
            <spinner color="#007bff" size="30px"></spinner>
        </div>
        <transition name="router-transition">
            <router-view></router-view>
        </transition>
    </div>
</template>
<script>
    import spinner from '../common/spinner';
    import { mapGetters } from 'vuex'

    export default {
        name: 'default',
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
    /*.router-transition-enter-active {*/
        /*animation: coming .5s;*/
        /*animation-delay: .5s;*/
        /*opacity: 0;*/
    /*}*/
    /*.router-transition-leave-active {*/
        /*animation: going 1s;*/
    /*}*/

    /*@keyframes going {*/
        /*from {*/
            /*transform: translateX(0);*/
        /*}*/
        /*to {*/
            /*transform: translateX(-25px);*/
            /*opacity: 0;*/
        /*}*/
    /*}*/
    /*@keyframes coming {*/
        /*from {*/
            /*transform: translateX(-25px);*/
            /*opacity: 0;*/
        /*}*/
        /*to {*/
            /*transform: translateX(0);*/
            /*opacity: 1;*/
        /*}*/
    /*}*/
</style>
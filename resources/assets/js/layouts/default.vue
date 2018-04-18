<!--
  - Copyright (c) 2018. Jake Toolson
  -->
<template>
    <div id="app">
        <error-message v-if="error.message" :type="error.type" :message="error.message"></error-message>
        <div id="loader" v-if="waiting" class="d-inline">
            <spinner color="#007bff" size="30px"></spinner>
        </div>
        <transition name="router-transition">
            <router-view></router-view>
        </transition>
    </div>
</template>
<script>
    import spinner from '@/common/spinner';
    import { mapGetters } from 'vuex'
    import ErrorMessage from '@/components/ErrorMessage';

    export default {
        name: 'default',
        computed: {
            ...mapGetters([
                'waiting',
                'error'
            ])
        },
        components: {
            ErrorMessage,
            'spinner' : spinner,
        },
    }
</script>
<style>
    #loader {
        position: fixed;
        bottom: 15px;
        right: 15px;
        width: 30px;
        height: 30px;
        z-index: 9999;
    }
</style>
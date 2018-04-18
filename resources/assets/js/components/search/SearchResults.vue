<!--
  - Copyright (c) Jake Toolson 2018.
  -->

<template>
    <div class="mt-5 container">
        <div class="items row">
            <div v-for="item in items" :key="item.id" class="col-sm-3">
                <planet-listing :item="item"></planet-listing>
            </div>
        </div>
    </div>
</template>
<script>
    import PlanetListing from '@/components/planet/PlanetListing';
    export default {
        name: 'search-results',
        props: {
            items : {
                type: Array,
                required: true
            },
        },
        components: {
            PlanetListing
        },
    }
</script>

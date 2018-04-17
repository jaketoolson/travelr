<!--
  - Copyright (c) Jake Toolson 2018.
  -->

<template>
    <div class="mt-5">
        <div :class="`items grid-xl-${display_per_row}-items grid-lg-${display_per_row-1}-items grid-md-2-items ${active_display_type}`">
            <div v-for="item in items" :key="item.id">
                <planet-listing :item="item"></planet-listing>
            </div>
        </div>
    </div>
</template>
<script>
    import PlanetListing from './../planet/PlanetListing';
    import listing_mixin from './../planet/listing-mixin';
    export default {
        name: 'SearchResults',
        mixins: [
            listing_mixin
        ],
        props: {
            items : {
                type: Array,
                required: true
            },
        },
        components: {
            'planet-listing' : PlanetListing
        },
    }
</script>

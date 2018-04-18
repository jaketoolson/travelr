<!--
  - Copyright (c) Jake Toolson 2018.
  -->

<template>
    <div v-if="item" class="item">
        <div class="card mb-4">
            <img :src="item.relationships.photo.links.thumb_src" :alt="item.attributes.name" class="card-img-top">
            <!--<div class="card-img-overlay">-->
                <!--<span class="text-white text-right">-->
                    <!--<i class="far fa-heart"></i>-->
                <!--</span>-->
            <!--</div>-->
            <div class="card-body">
                <small class="text-muted text-xs text-uppercase">{{ item.relationships.galaxy.meta.name }}</small>
                <h5 class="card-title">
                    <a :href="link" class="title">{{ item.attributes.name }}</a>
                </h5>
                <p class="card-text text-muted">${{ item.attributes.price_dollars }} per night</p>
                <review-stars :total="Math.ceil(item.attributes.average_rating)"></review-stars>
                <!--<p class="card-text">{{ item.attributes.description | truncate(60) }}</p>-->
            </div>
        </div>
    </div>
</template>
<script>
    import {filters} from '@/common/mixins';
    import ReviewStars from '@/components/ReviewStars';
    import { getRouteByName } from '@/router';

    export default {
        name: 'planet-listing',
        components: {
            ReviewStars
        },
        mixins: [
            filters,
        ],
        props: {
            item : {
                type: Object,
                required: true
            },
        },
        computed : {
            link () {
                return getRouteByName('planets.show', {id: this.item.id});
            }
        },
    }
</script>

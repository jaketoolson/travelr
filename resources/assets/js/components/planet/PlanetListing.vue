<!--
  - Copyright (c) Jake Toolson 2018.
  -->

<template>
    <div v-if="item" class="item">
        <div class="card mb-4">
            <img :src="item.relationships.photo.links.thumb_src" alt="" class="card-img">
            <!--<div class="card-img-overlay">-->
                <!--<span class="text-white text-right">-->
                    <!--<i class="far fa-heart"></i>-->
                <!--</span>-->
            <!--</div>-->
            <div class="card-body">
                <small class="text-muted text-xs text-uppercase">{{ item.relationships.galaxy.meta.name }}</small>
                <h5 class="card-title">
                    <a :href="item.links.self" class="title">{{ item.attributes.name }}</a>
                </h5>
                <p class="card-text text-muted">${{ item.attributes.price_dollars }} per night</p>
                <!--<p class="card-text">{{ item.attributes.description | truncate(60) }}</p>-->
            </div>
        </div>
    </div>
</template>
<script>
    import {filters} from '../../common/mixins';
    export default {
        mixins: [
            filters,
        ],
        props: {
            item : {
                type: Object,
                required: true
            },
        },
    }
</script>

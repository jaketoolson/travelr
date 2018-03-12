<!--
  - Copyright (c) Jake Toolson 2018.
  -->

<template>
    <div v-if="item" class="item">
        <div class="wrapper">
            <div class="image">
                <h3>
                    <!--<a href="#" class="tag category">Category</a>-->
                    <a :href="item.links.uri" class="title">{{ item.name }}</a>
                    <!--<span class="tag">Offer</span>-->
                </h3>
                <a :href="item.links.uri"
                   class="image-wrapper background-image"
                   :style="`background-image: url('${item.photo.links.thumb.uri}');`">
                    <img :src="item.photo.links.thumb.uri" alt="">
                </a>
            </div>
            <h4 class="location">
                <i class="fas fa-globe"></i>
                <a :href="item.relationships.galaxy.links.uri">{{ item.relationships.galaxy.name }}</a>
            </h4>
            <div class="price">${{ item.price_dollars }}</div>
            <div class="meta">
                <figure>
                    <i class="far fa-calendar"></i> 28.04.2017
                </figure>
                <figure>
                    <a href="#">
                        <i class="fas fa-user"></i> Peter Browner
                    </a>
                </figure>
            </div>
            <div class="description">
                <p>{{ item.description | truncate(60) }}</p>
            </div>
            <div class="additional-info">
                <ul>
                    <li>
                        <figure>Start Date</figure>
                        <aside>25.06.2017 09:00</aside>
                    </li>
                    <li>
                        <figure>Length</figure>
                        <aside>2 months</aside>
                    </li>
                    <li>
                        <figure>Bedrooms</figure>
                        <aside>3</aside>
                    </li>
                </ul>
            </div>
            <a :href="item.links.uri" class="detail text-caps underline">Detail</a>
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

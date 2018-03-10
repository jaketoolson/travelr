<template>
    <div v-if="item" class="item">
        <div class="wrapper">
            <div class="image">
                <h3>
                    <a href="#" class="tag category">{{ item.name }}</a>
                    <a href="single-listing-1.html" class="title">Creative Course</a>
                    <span class="tag">Offer</span>
                </h3>
                <a href="single-listing-1.html" class="image-wrapper background-image" style="background-image: url('http://themestarz.net/html/craigs/assets/img/image-03.jpg');">
                    <img src="http://themestarz.net/html/craigs/assets/img/image-03.jpg" alt="">
                </a>
            </div>
            <h4 class="location">
                <a href="#">Nashville, TN</a>
            </h4>
            <div class="price">${{ item.price }}</div>
            <div class="meta">
                <figure>
                    <i class="fa fa-calendar-o"></i>28.04.2017
                </figure>
                <figure>
                    <a href="#">
                        <i class="fa fa-user"></i>Peter Browner
                    </a>
                </figure>
            </div>
            <div class="description">
                <p>Proin at tortor eros. Phasellus porta nec elit non lacinia. Nam bibendum erat at leo faucibus vehicula. Ut laoreet porttitor risus, eget suscipit tellus tincidunt sit amet. </p>
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
            <a href="single-listing-1.html" class="detail text-caps underline">Detail</a>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            item : {
                type: Object,
                required: true
            },
        },
    }
</script>

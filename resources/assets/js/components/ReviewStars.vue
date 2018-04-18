<!--
  - Copyright (c) 2018. Jake Toolson
  -->
<template>
    <span class="text-muted text-xs">
        <template v-if="total">
            <span v-for="value in max">
                <i v-if="total < value" class="far fa-star"></i>
                <i v-else class="fas fa-star"></i>
            </span>
        </template>
        <span v-else>0 reviews</span>
    </span>
</template>
<script>
    export default {
        name: "review-stars",
        props: {
            max : {
                type: Number,
                default: 5,
            },
            total : {
                type: Number,
                default: null,
            }
        },
    }
</script>
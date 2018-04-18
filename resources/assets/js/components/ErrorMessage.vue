<!--
  - Copyright (c) 2018. Jake Toolson
  -->

<template>
    <div :class="`alert alert-${type}`">
        <p class="">{{ message }}</p>
    </div>
</template>
<script>
    export default {
        name: "error-message",
        props: {
            type: {
                type: String,
                required: true,
                validator: function (value) {
                    return ['success', 'warning', 'error', 'info', 'danger'].indexOf(value) !== -1
                }
            },
            message: {
                type: String,
                required: true,
            }
        }
    }
</script>
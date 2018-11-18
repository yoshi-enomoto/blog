<template>
    <button @click="countUp">Like {{ count }}</button>
</template>

<script>
    export default {
        data() {
            return {
                count: 0
            }
        },
        methods: {
            countUp: function() {
                this.count++;
            }
        }
    }
</script>

<style>
    body {
        font-size: 16px;
        font-family: Verdana, sans-serif;
    }
</style>

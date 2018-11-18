<template>
    <!-- <button @click="countUp">Like {{ count }}</button> -->
    <button @click="countUp">{{ message }} {{ count }}</button>
</template>

<script>
    export default {
        // カスタム属性を Component で受け取るには props というキーで受け取る。
        // props: ['message'],

        // propsは、デフォルト値や型を指定することも可能。
        // その場合はオブジェクト形式で記述。
        props: {
            message: {
                type: String,
                default: 'Like'
            }
        },
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

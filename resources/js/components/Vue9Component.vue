<template>
    <!-- <button @click="countUp">Like {{ count }}</button> -->
    <button @click="countUp">{{ message }} {{ count }}</button>
</template>

<script>
    export default {
        // カスタム属性を Component で受け取るには props というキーで受け取る。
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

                // Component の方から、イベントを発火して incrementTotal （親要素）を実行されるようにする
                this.$emit('increment');
                    // $emit：イベントの発火に使用する命令。
                    // ＝ Component の方の count が増えたときに emit を実行する
            },
        }
    }
</script>

<style>
    body {
        font-size: 16px;
        font-family: Verdana, sans-serif;
    }
</style>

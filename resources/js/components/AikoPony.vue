<!-- テキスト入力とhtmlテキストの連動 -->
<!-- ボタン押下による固定文字列へ変更 -->

<template>
    <div>
        <input type="text" v-model="textBox">
        <button type="button" @click="changeTextBox()">『特定文字列』に変更するボタン</button>
        <br>
        <br>
        変数の中身： {{ textBox }}
    </div>
</template>

<script>
    export default {
        data() {
            return {
                textBox: "テキスト入力",
            }
        },
        methods: {
            changeTextBox() {
                this.textBox = "aiko"
            }
        },
    }
</script>

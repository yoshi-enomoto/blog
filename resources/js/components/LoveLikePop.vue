<template>
    <div>
        <select v-model="selectBoxValue">
            <option value="0">でふぉるで選択されている肢</option>
            <option v-for="(label, id) in selectBoxoptions" :value="id">{{ label }}</option>
                <!-- dataの中身がオブジェクト構成 -->
                <!-- 配列構成の場合はv-forの記述内容が別となる -->
        </select>
        <button type="button" @click="changeSelectBox()">beatへ強制更新ボタン</button>
        <br>
        <br>
        変数の中身： {{ selectBox }} ({{ selectBoxValue }})
    </div>
</template>

<script>
    export default {
        data() {
            return {
                selectBoxValue: 0,
                selectBoxoptions: {
                    1: "kisshug",
                    2: "milk",
                    3: "beat",
                    yui: "rolling star",
                    miwa: "delight",
                }
            }
        },
        methods: {
            changeSelectBox() {
                this.selectBoxValue = 3;
            }
        },
        computed: {
            selectBox() {
                return this.selectBoxoptions[this.selectBoxValue];
            }
        }
    }



</script>

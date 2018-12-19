<template>
    <div>
        <h3>todo list</h3>
        <input type="text" v-model="input">
        <input type="button" value="追加" @click="addText()">
        <ul>
            <!-- <li v-for="list in lists" :key="list.id">{{ list.text }}</li> -->
                <!-- 『:key』を忘れないようにする！ -->
                <!-- 『ul』で回すとulが数分出来てしまう為、『li』で回す -->

            <li v-for="list in lists" :key="list.id">
                <span :class="{ complete: list.isComplete}">{{ list.text }}</span>
                <input type="button" value="完了" @click="list.isComplete=true">
                <input type="button" value="削除" @click="">
            </li>
        </ul>
            デバック用：{{ input }}
    </div>
</template>

<script>
    export default {
        data() {
            return {
                lists: [
                    { id: 1, text: "aiko", isComplete: false},
                    { id: 2, text: "yui", isComplete: false},
                    { id: 3, text: "miwa", isComplete: false},
                ],
                input: "",
                id: 4,
                isComplete: false,
            }
        },
        methods: {
            addText() {
                // テキストボックスが空の場合は処理をスキップ
                // if(!this.input.trim()) {
                if(!this.input.length) {
                    return;
                };
                this.lists.push({
                    id: this.id++,
                    text: this.input,
                    isComplete: false,
                });
                // 追加処理の後、テキストボックスを空にする
                this.input = "";
            }
        }
    }
</script>

<style scoped>
    .list{
        width: 60%;
        margin: auto;
        text-align: left;
    }
    /* complete がついた要素には取り消し線を入れる */
    .complete{
        text-decoration: line-through;
    }
</style>

<template>
    <div>
        <h3>todo list</h3>
        <input type="text" ref="new_task" v-model="input" @keydown.enter="addText()">
            <!-- keydown.enterでエンター押下でメソッド発動 -->
        <input type="button" value="追加" @click="addText()">
        <ul>
            <!-- <li v-for="list in lists" :key="list.id">{{ list.text }}</li> -->
                <!-- 『:key』を忘れないようにする！ -->
                <!-- 『ul』で回すとulが数分出来てしまう為、『li』で回す -->

            <li v-for="list in lists" :key="list.id">
                <span :class="{ complete: list.isComplete}">{{ list.text }}</span>
                <input type="button" v-if="!list.isComplete" value="完了" @click="list.isComplete=true">
                <input type="button" v-if="list.isComplete" value="戻す" @click="list.isComplete=false">
                    <!-- 『list.isComplete』のみで条件となる -->
                <input type="button" value="削除" @click="deleteText(list)">
                    <!-- ここで渡すのは削除ボタンを押す対象のオブジェクト -->
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
            },
            deleteText(obj) {
                // 選択されたリストはオブジェクト
                this.lists = this.lists.filter(e => e !== obj);
            }
        },
        // テキストボックスへの自動フォーカス：機能せず（エラーは出ない）
        mounted: function() {
            console.log(this.$refs.new_task);
            this.$refs.new_task.focus();
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

<template>
    <div>
        <h3>todo list</h3>
        <input type="text" v-model="input">
        <input type="button" value="追加">
        <ul>
            <li v-for="list in lists" :key="list.id">{{ list.text }}</li>
                <!-- 『:key』を忘れないようにする！ -->
                <!-- 『ul』で回すとulが数分出来てしまう為、『li』で回す -->
        </ul>
            デバック用：{{ input }}
    </div>
</template>

<script>
    export default {
        data() {
            return {
                lists: [
                    { id: 1, text: "aiko"},
                    { id: 2, text: "yui"},
                    { id: 3, text: "miwa"},
                ],
                input: "",
            }
        },
    }
</script>

<style scoped>
    .list{
        width: 60%;
        margin: auto;
        text-align: left;
    }
</style>

<template>
    <div class="delete">
        <h2>My Todos：&delete</h2>
        <ul>
            <!-- <li v-for="todo in todos"> -->
                <!-- v-for：配列をループさせて表示させる命令 -->
            <li v-for="(todo, index) in todos">
                <!-- 取り出した値に0からの順番が振られる -->
                {{ todo }}
                <span @click="deleteItem(index)" class="command">[x]</span>
                    <!-- deleteItemには何番目を削除するか明示的にする -->
            </li>
        </ul>

        <!-- todoに追加する為のform -->
        <!-- <form v-on:submit="addItem"> -->
            <!-- v-on：DOM要素にイベントリスナーを登録する -->
        <form @submit.prevent="addItem">
            <input type="text" v-model="newItem">
                <!-- v-model：v-textと同様にDOM要素の内側をテキストノードとしてすべて書き換える -->

                <!-- v-text：DOM要素の内側をテキストノードとしてすべて書き換える -->
            <input type="submit" value="Add">
        </form>
    </div>
</template>


<script>
    export default {
        // dataは関数でなければなりません
        data () {
            // Vue インスタンスのためのデータオブジェクトです。
            return {
                newItem: '',
                todos: [
                    'task1',
                    'task2',
                    'task3',
                ],
            }
        },
        methods: {
            // Vue インスタンスに組み込まれるメソッド。
            addItem: function() {
                this.todos.push(this.newItem);
                this.newItem = '';
            },
            deleteItem: function(index) {
                // 『confirm』を付けることにより、確認を促す
                if (confirm('are you sure?')) {
                    this.todos.splice(index, 1);
                        // 『splice』：index番目1つ削除する
                }
            }

        },
    }

// ディレクティブ：v-bindとかv-forとかのhtmlのタグの中に書くやつ。
// コンポーネントオプション：Vueインスタンス内のオブジェクトたちの名前（dataとかmethodsとかpropsとか）

</script>


<!-- 『scoped』を付けることで、スタイルの適用される範囲を限定できる -->
<style scoped>
    body {
      font-size: 16px;
      font-family: Verdana, sans-serif;
    }

    .container {
      width: 300px;
      margin: auto;
    }

    #app h1 {
      font-size: 16px;
      border-bottom: 1px solid #ddd;
      padding: 16px 0;
    }

    #app li {
      line-height: 1.5;
    }

    #app input[type="text"] {
      padding: 2px;
    }

    .command {
      font-size: 12px;
      cursor: pointer;
      color: #08c;
    }
</style>

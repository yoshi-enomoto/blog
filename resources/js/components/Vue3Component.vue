<template>
    <div class="complete">
        <h2>My Todos：&complete</h2>
        <ul>
            <li v-for="(todo, index) in todos">
                <!-- v-for：配列をループさせて表示させる命令 -->
                <!-- チェックボックスを追加 -->
                <input type="checkbox" v-model="todo.isDone">
                    <!-- checkbox の場合、単に v-model に対して todo.isDone を紐づけてあげると、 isDone が true のときにはチェックしてくれる。 -->
                    <!-- <span v-bind:class="{done: todo.isDone}">{{ todo.title }}</span> -->
                    <!-- 上と下は同じ意味（v-bindも省略可能） -->
                    <span :class="{done: todo.isDone}">{{ todo.title }}</span>
                        <!-- v-bind：データに応じてクラスを付け替える。 -->
                        <!-- v-bind:class で done として、 todo.isDone とすることで、todo の isDone が true の場合は、 done クラスを付ける意味となる。 -->
                <span @click="deleteItem(index)" class="command">[x]</span>
            </li>
        </ul>

        <!-- todoに追加する為のform -->
        <form @submit.prevent="addItem">
            <!-- v-on：DOM要素にイベントリスナーを登録する -->
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
                todos: [{
                    // オブジェクトにする。（以外に完了項目も管理する為）
                    title: 'task1',
                    isDone: false
                }, {
                    title: 'task2',
                    isDOne: false
                }, {
                    title: 'task3',
                    isDone: true
                }]
            }
        },
        methods: {
            // Vue インスタンスに組み込まれるメソッド。
            addItem: function() {
                // item で新しく定義。isDone を含めて追加。
                var item = {
                    title: this.newItem,
                    isDone: false
                };
                // this.todos.push(this.newItem);
                // push() するのはここで定義したitemとなる。
                this.todos.push(item);
                this.newItem = '';
            },
            deleteItem: function(index) {
                if (confirm('are you sure?')) {
                    this.todos.splice(index, 1);
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

    #app ul {
      padding: 0;
      list-style: none;
    }

    #app li > span.done {
      text-decoration: line-through;
      color: #bbb;
    }
</style>

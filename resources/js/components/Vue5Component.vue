<template>
    <div class="complete">
        <h2>
            My Todos：&undoneCount
            <span class="info">({{ remaining }}/{{ todos.length }})</span>
                <!-- プロパティを記述すれば実行してくれる -->
        </h2>
        <ul>
            <li v-for="(todo, index) in todos">
                <input type="checkbox" v-model="todo.isDone">
                    <span :class="{done: todo.isDone}">{{ todo.title }}</span>
                <span @click="deleteItem(index)" class="command">[x]</span>
            </li>
            <li v-show="!todos.length">nothing yat!
                <!-- v-show：条件分岐により表示・非表示を決めるディレクティブ。
                     CSSにより表示・非表示を切り替える。 -->
            </li>
        </ul>

        <!-- v-ifで記述する場合 -->
        <!-- ディレクティブを2つ記載すると、v-forが先に実行されてしまう為、記述自体の変更 -->
        <ul v-if="todos.length">
            <!-- v-if：条件分岐により表示・非表示を決めるディレクティブ。
                 条件が正しくなった時点で、新しく要素を作る。 -->
            <li v-for="(todo, index) in todos">
                <!-- v-for：配列をループさせて表示させる命令 -->
                <input type="checkbox" v-model="todo.isDone">
                    <span :class="{done: todo.isDone}">{{ todo.title }}</span>
                        <!-- v-bind：データに応じてクラスを付け替える。 -->
                <span @click="deleteItem(index)" class="command">[x]</span>
            </li>
        </ul>
        <ul v-else>
            <li>nothing yat!
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
        computed: {
            // Vue インスタンスに組み込まれる算出プロパティ。
            // データから動的にプロパティを計算してくれる。

            // isDoneがfalseである項目の数を調べる
            remaining: function() {
                var items =this.todos.filter(function(todo) {
                    // 引数として与えられた条件（テスト関数）を各配列要素に対して実行し、合格したすべての配列要素からなる新しい配列を生成する。
                    return !todo.isDone;
                });
                return items.length;
            }
        }
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

    .info {
      color: #bbb;
      font-size: 12px;
      font-weight: normal;
    }
</style>

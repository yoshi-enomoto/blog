<template>
    <div>
        <h2>My Todos：list & add</h2>
        <ul>
            <p>自力で全て記述している場合</p>
            <li>{{ todos[0] }}</li>
            <li>{{ todos[1] }}</li>
            <li>{{ todos[2] }}</li>
            <p>v-forで回して記述している場合</p>
            <li v-for="todo in todos">{{ todo }}</li>
                <!-- v-for：配列をループさせて表示させる命令 -->
                <!-- 定義している『todos』を『todo』に入れる -->
                <!-- （『todo』箇所は記述時に自由に定義する） -->
        </ul>

        <!-- todoに追加する為のform -->
        <!-- form が submit された時に newItem の値を data の todos に追加する。
 -->
        <!-- <form v-on:submit="addItem"> -->
            <!-- v-on：DOM要素にイベントリスナーを登録する -->
            <!-- 『v-on:』=『@』で表すことができる -->
        <!-- <form @submit="addItem"> -->
        <form @submit.prevent="addItem">
            <!-- 『.prevent』とすることで、『e.preventDefault();』と同等になる -->
            <input type="text" v-model="newItem">
                <!-- v-model：v-textと同様にDOM要素の内側をテキストノードとしてすべて書き換える -->
                <!--編集可能な要素（input）にセットする事でプロパティをリアルタイムでの変更が可能となる -->

                <!-- v-text：DOM要素の内側をテキストノードとしてすべて書き換える -->
                <!-- {{property}}の形式もテキストノードとして変換され部分的な書き換えを行う場合に使用 -->
            <input type="submit" value="Add">
        </form>
    </div>
</template>


<script>
    export default {
        // dataは関数でなければなりません
            // 各インスタンスが返されるデータオブジェクトの独立したコピーを保持できるため
        data () {
            // Vue インスタンスのためのデータオブジェクトです。
            return {
                newItem: '',
                    // 空文字を設定：『』関連付いている為、値を設定すると、初期値として入力されている。
                todos: [
                    'task1',
                    'task2',
                    'task3',
                ],
            }
        },
        methods: {
            // Vue インスタンスに組み込まれるメソッド。

            // htmlのタグに『.prevent』を付けない場合
            // addItem: function(e) {
            //     e.preventDefault();
            //     this.todos.push(this.newItem);
            //     this.newItem = '';
            // }
            // htmlのタグに『.prevent』を付けた場合、『e.preventDefault();』は省略できる
            addItem: function() {
                // 『todos』にnewItemのデータを追加する。（push：配列に要素を追加する）
                this.todos.push(this.newItem);
                // 入力フォームを空にする
                this.newItem = '';
                    // dataデータには『this』でアクセス可能。
                    // 『this.キー』で対象バリューにアクセス可能。
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
</style>

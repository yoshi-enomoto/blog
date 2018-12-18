<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>My Vue App</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>

    <body>
        <!-- vue.jsで扱うUIの領域を定義 -->
        <div id="app">
            <!-- <p>Hello @{{ name }}!</p> -->
                <!-- 同一ページで記述する場合、変数の展開は『@』を付ける（bladeの場合） -->
            <p>Hello @{{ name.toUpperCase() }}!</p>
                <!-- dataからUIへの反映：二重波括弧 -->
                <!-- ※jsの式をそのまま書ける -->

            <p><input type="text" v-model="name"></p>
                <!-- UIからdataへの反映：inputタグの『v-model』にdataのキーを結び付ける -->
        </div>

        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
        <script>
            (function() {
                'use strict';

                // two way data binding (to UI)

                // UI に結びつくモデルを作る（View Model）＝vm
                var vm = new Vue({

                    // どの領域の Vue と結びつけるかを elements キーで指定する。
                    el: '#app',

                    // 更にインスタンス中でdataを保持させる
                    // キー：data、更にキー＆バリューを指定。
                    data: {
                        name: 'someone!（feel free to write below）'
                    }
                });
            })();
        </script>
    </body>
</html>

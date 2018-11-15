<!-- htmlとjsに分けて記述したものを単一コンポーネントで記述する場合 -->
<!-- 内容は『vue00.blade.php』と同じ -->
<template>
    <!-- template内に書く場合も『div』で一括りするのは必須 -->
    <!-- - Component template should contain exactly one root element. -->
    <div>
        <!-- <p>Hello {{ name }}!</p> -->
            <!-- 単一コンポーネントの場合、変数の展開に『@』は不要 -->
        <p>Hello {{ name.toUpperCase() }}!</p>
            <!-- dataからUIへの反映：二重波括弧 -->
            <!-- ※jsの式をそのまま書ける -->

        <p><input type="text" v-model="name"></p>
            <!-- UIからdataへの反映：inputタグの『v-model』にdataのキーを結び付ける -->
    </div>


</template>

<script>
    // 単一コンポーネントの場合、new Vue()とeleキーの指定は不要（app.jsで行なっている為）
    // 代わりに『export dafault {}』で囲む。
    // 『data:{}』も『data(){}』に書き換える。
    export default {
        data () {
            return {
                name: 'takanori'
            }
        }
    }

</script>

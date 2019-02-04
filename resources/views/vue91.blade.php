<html>
    <body>
        <div id="app">
            <select v-model="selectBoxValue">
                <option v-for="(label,id) in selectBoxOptions" :value="id">@{{ label }}</option>
            </select>
            <button type="button" @click="changeSelectBox()">ボタン</button>
            <br>
            <br>
            変数の中身： @{{ selectBox }}（@{{ selectBoxValue }}）
        </div>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
        <script>
            new Vue({
                el: '#app',
                data: {
                    selectBoxValue: 1,
                    selectBoxOptions: {
                        1: '赤',
                        2: '青',
                        3: '黄色',
                    }
                },
                methods: {
                    changeSelectBox() {
                        this.selectBoxValue = 3; // 黄色へ変更
                    }
                },
                computed: {
                    selectBox() {
                        return this.selectBoxOptions[this.selectBoxValue];
                    }
                }
            });
        </script>
    </body>
</html>

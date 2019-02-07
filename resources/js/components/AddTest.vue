<template>
    <div class="add-test">
        <div v-for="(item, index) in items" :key="index">
            <div class="form-group">
                <label :for="'test_id-'+index" class="control-label col-md-3">
                    <!-- <input type="text/submit/hidden/button/etc" name="" value=""> -->
                    <slot name="test_id-label">blogタイトル</slot>
                </label>
                <div class="col-md-5">
                    <select2 class="form-control" v-model="item.admin" :id="'test_id'+index" :name="'test_id['+index+']'">
                        <option value="">選択して下さい</option>
                        <option v-for="aiko in aikos" :value="aiko.id">{{ aiko.title }}</option>
                    </select2>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-block btn-default add_buttum" @click="addItem(index)">
                        <slot name="add-button-text"><i class="fa fa-plus"></i>追加する</slot>
                    </button>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-block btn-default" @click="deleteItem(index)" :disabled="items.length === 1">
                        <slot name="delete-button-text"><i class="fa fa-times"></i>削除する</slot>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    // インポート
    import Select2 from './Select2.vue';

    export default {
        components: {
            Select2,
        },
        props: {
            aikos: Object,
            value: Object,
        },
        data() {
            return {
                items: [
                    {
                        admin: "",
                    },
                ],
            }
        },
        created() {
            if (this.value) {
                let tmp = [];

                // if/elseで1管理者に対して紐付きの有無の条件分けを行う。
                if (Object.keys(this.value).length != 0) {
                    for (let i=0; i<Object.keys(this.value).length; i++) {
                        tmp.push({admin: this.value[i]});
                    }
                    this.items = tmp;
                } else {
                    tmp.push({admin: ""});
                    this.items = tmp;
                }
            }
        },
        methods: {
            deleteItem(index) {
                this.items.splice(index, 1);
            },
            addItem(index) {
                this.items.splice(++index, 0, {
                    admin: "",
                });
            },
        },
    }
</script>

<style scoped>
</style>

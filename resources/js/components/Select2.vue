<template>
    <select>
        <slot></slot>
    </select>
</template>

<script>
    export default {
        props: ['option', 'value'],
        mounted: function() {
            console.log(this.options);
                var vm = this
                $(this.$el)
                    //  init select2
                    .select2({
                        data: this.options,
                        language: {"noResults": function(){return "一致するものはありません";}}
                    })
                    .val(this.value)
                    .trigger('change')
                    // emit event on chage
                    .on('change', function() {
                        vm.$emit('input', this.value)
                    })
        },
        watch: {
            value: function(value) {
                console.log('this'+this.$el);
                console.log('value'+value);
                    // update value
                    $(this.$el)
                        .val(value)
                        .trigger('chagen')
            },
            options: function(option) {
                console.log('this'+this);
                console.log('option'+options);
                    // update options
                    $(this.$el).empty().select2({ data: options})
            }
        },
        destroyed: function() {
            $(this.$el).off().select2('destroy')
        }
    };
</script>

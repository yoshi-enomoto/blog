<template>
  <el-select v-model="value" placeholder="Select">
    <el-option
      v-for="item in options"
      :key="item.value"
      :label="item.label"
      :value="item.value">
    </el-option>
  </el-select>
</template>

<script>
  export default {
    data() {
      return {
        options: [{
          value: '1st',
          label: 'ちいまる'
        }, {
          value: '2nd',
          label: '木の下'
        }, {
          value: '3rd',
          label: '夏服'
        }, {
          value: '4th',
          label: '秋'
        }, {
          value: '5th',
          label: '暁'
        }],
        value: ''
      }
    }
  }
</script>

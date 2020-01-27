<template>
     <div>
        <el-menu
        :default-active="activeIndex2"
        class="el-menu-demo"
        mode="horizontal"
        background-color="#545c64"
        text-color="#fff"
        active-text-color="#ffd04b">
        <el-menu-item index="1" @click="emitFunc(1)">2019-nCov境外自查表</el-menu-item>
        <el-menu-item index="2" @click="emitFunc(2)">信息中心</el-menu-item>
        <el-menu-item index="3" @click="emitFunc(3)">关于</el-menu-item>
        </el-menu>
    </div>
</template>

<script>
import axios from 'axios'
import Qs from 'qs'
export default {
    name: "Header",
    data() {
        return {
            activeIndex: '1',
            activeIndex2: '1'
        }
    },
    methods: {
        emitFunc(data) {
            this.$emit('handleFunc', data);
        }
    }
}
</script>

<style lang="scss" scoped>
</style>
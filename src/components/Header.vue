<template>
    <header class="navbar" style="z-index: -99999;">
        <section class="navbar-section container">
            <a class="navbar-brand mr-2" @click="emitFunc(1)">首页</a>
            <a class="btn btn-link" @click="emitFunc(2)">信息中心</a>
            <a class="btn btn-link" @click="emitFunc(3)">预防知识</a>
            <a class="btn btn-link" @click="emitFunc(4)">关于</a>
        </section>
    </header>

</template>

<script>
import axios from 'axios';
import Qs from 'qs';
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
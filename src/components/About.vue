<template>
    <div class="wrap">
        <h1>关于</h1>
        <div class="user" v-for="item of about" :key="item.id">{{item}}</div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    name: "About",
    data() {
        return {
            about: []
        }
    },
    mounted() {
    axios
        .get('/api/data.json')
        .then((res) => {
            const data = res.data
            this.about = data.about
        })
    }
}
</script>

<style lang="scss">
h1 {
    text-align: center;
    color: #fff;
}

.wrap {
    width: 100%;
    margin: auto;
}

.user{
    text-align: center;
    color: #fff;
    line-height: 20px;
}
</style>
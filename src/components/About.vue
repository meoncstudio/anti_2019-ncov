<template>
    <div class="columns info">

        <div class="column col-12">
            <div class="card title">
                <h3>关于</h3>
            </div>
        </div>

        <div class="column col-12">
            <div class="card" v-for="item of about" :key="item.id" v-html="item">{{item}}</div>
        </div>

    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: "About",
    data() {
        return {
            about: []
        }
    },
    mounted() {
    axios
        .get('/api/data.json?' + Math.random())
        .then((res) => {
            const data = res.data
            this.about = data.about
        })
    }
}
</script>

<style lang="scss">
*{

}
</style>
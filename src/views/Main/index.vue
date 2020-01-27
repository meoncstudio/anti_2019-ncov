<template>
<div>
    <v-header @handleFunc='changeFunc'/>

    <div class="container">
        <survey v-if="display==1"></survey>
        <info v-if="display==2"></info>
        <about v-if="display==3">"</about>
    </div>
    
    <div class="bg"></div>
    <div class="cover"></div>

</div>
</template>

<script>
import NavMenu from '../../components/navMenu';
import Header from '../../components/Header';
import Survey from '../Survey';
import About from '../../components/About';
import Info from '../../components/Info';

export default {
    name: "Main",
    components: {
        'NavMenu': NavMenu,
        'vHeader': Header,
        "Survey": Survey,
        "About": About,
        'Info': Info
    },
    data() {
        return {
            display: 1
        }
    },
    methods: {
        changeFunc(data) {
            this.display = data;
        }
    },
    mounted() {

    }
}
</script>

<style lang="scss" scoped>

</style>
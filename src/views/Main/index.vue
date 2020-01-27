<template>
<div>
    <v-header @handleFunc='changeFunc'/>

    <div class="container">
        <survey v-if="display==1"></survey>
        <info v-if="display==2"></info>
        <health v-if="display==3"></health>
        <about v-if="display==4">"</about>
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
import Health from '../../components/Health';

export default {
    name: "Main",
    components: {
        'NavMenu': NavMenu,
        'vHeader': Header,
        "Survey": Survey,
        "About": About,
        'Info': Info,
        "Health" : Health
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
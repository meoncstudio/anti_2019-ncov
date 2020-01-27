<template>
<div>
    <el-container class="container">
        <el-header class="header">
            <v-header @handleFunc='changeFunc'/>
        </el-header>
        <el-main class="main">
            <survey v-if="display==1"></survey>
            <info v-if="display==2"></info>
            <about v-if="display==3">"</about>
        </el-main>
        <el-footer>
            <div id="footer">Copyright©2020 <a href="http://www.jimschenchen.com">jimschenchen</a> from <a href="http://Meonc.studio">MeoncStudio</a>. All rights reserved</div> 
        </el-footer>
    </el-container>

</div>
</template>

<script>
import NavMenu from '../../components/navMenu'
import Header from '../../components/Header'
import Survey from '../Survey'
import About from '../../components/About'
import Info from '../../components/Info'

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
        this.$message('欢迎使用2019-nCov境外自查表');
    }
}
</script>

<style lang="scss" scoped>
* {
    padding: 0;
    margin: 0;
}
.header {
  background-color: #409EFF;
  color: #fff;
  line-height: 60px;
}

#footer {
      height: 30px;
      line-height: 30px;
      position: absolute;
      bottom: 0px;
      width: 100%;
      text-align: center;
      color: #fff;
      font-family: Arial;
      font-size: 10px;
      letter-spacing: 1px;
  }
  a:link { 
      font-size: 12px;
      color: #000;
  }
</style>
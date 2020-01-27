<template>
    <div id="login">
        <div class="login-wrap">
            <ul class="menu-tab">
                <li v-for="item in menuTab" :key="item.id" :class="{'current':item.current}" @click="toggleMenu(item)">{{item.txt}}</li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: "login",
    data() {
        return {
            menuTab: [
                { txt: "login", current: true},
                { txt: "register", current: false},
            ], 
        }  
    },
    methods: {
        toggleMenu(data){
            this.menuTab.forEach(element => {
                element.current = false
            });
            data.current = true;
        }
    }
}
</script>


<style lang="scss" scoped>
#login {
    // height: 100vh;
    background-color: #344a5f;
    position:absolute;
    top:0px;
    left:0px;
    width:100%;
    height:100%;
}
.login-wrap {
    width: 330px;
    margin:auto;
}
.menu-tab {
    text-align: center;
    li {
        display: inline-block;
        width: 88px;
        line-height: 36px;
        font-size: 14px;
        color: #fff;
        border-radius: 2px;
        cursor: pointer;
    }
}
.current {
    background-color: rgba(0, 0, 0, .1)
}
</style>
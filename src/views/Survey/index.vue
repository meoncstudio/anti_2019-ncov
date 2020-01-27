<template>
<div>
    <div id="survey">
        <h1>2019-nCov境外自查表</h1>
        <div class="survey-wrap">
            <span class="sta">使用人数统计： {{this.visitNumer}}</span>
            <el-card class="box-card">
                <div slot="header" class="clearfix">
                    <span id="title">2019-nCov境外自查表</span>
                    <el-button style="float: right; padding: 3px 0" type="text" @click="restart()">重新开始</el-button>
                </div>
                <div class="question-wrap" v-if="display==1">
                    <div id="question">Quesion #{{this.currentQuestions.id}}:</div>
                    <div>{{this.currentQuestions.content}}</div>
                    <el-divider></el-divider>
                    <div class="button-wrap">
                        <el-button-group>
                            <el-button class="button" type="primary" icon="el-icon-arrow-left" @click="submitQuestion(1)">{{this.currentQuestions.btn1}}</el-button>
                            <el-button class="button" type="primary" @click="submitQuestion(2)">{{this.currentQuestions.btn2}}<i class="el-icon-arrow-right el-icon-right"></i></el-button>
                        </el-button-group>
                    </div>
                </div>
                <div class="result-wrap" v-if="display==2">
                    <div id="result">Result {{this.currentResult.id}}:</div>
                    <div>{{this.currentResult.content}}</div>
                </div>
            </el-card>
        </div>
        <h5>注：内容均由2019-ncoV小战队成员总结提供， 若有最新消息请点击上方关于按钮联系我们，谢谢！</h5>
    </div>  
</div>
</template>

<script>
import axios from 'axios'
export default {
    name: "login",
    data() {
        return {
            currentQuestions: { id: 1, content: 'loading', btn1: 'a 有', btn2: 'b 无', opt1: 2, opt2: 3},
            questions: [],
            currentResult: { id: 1, content: 'loading'},
            results: [],
            display: 1,
            visitNumer: 0
        }  
    },
    methods: {
        submitQuestion(data) {
            let redirect = -1;
            let result = -1;
            if(data==1){
                if(this.currentQuestions.opt1) {
                    redirect = this.currentQuestions.opt1;
                } else {
                    result = this.currentQuestions.rst1;
                }
            }else if(data==2){
                if(this.currentQuestions.opt2) {
                    redirect = this.currentQuestions.opt2;
                } else {
                    result = this.currentQuestions.rst2;
                }
            }
            if (result < 0) {
                // no result redirect
                this.questions.forEach(element => {
                    if(element.id == redirect){
                        this.currentQuestions = element;
                    }
                });
            } else {
                // go to result
                this.results.forEach(element => {
                    if(element.id == result){
                        this.currentResult = element;
                    }
                });
                this.display = 2;
                this.updateSta();
            }
        },
        restart() {
            this.currentQuestions = this.questions[0];
            this.display = 1;
        },
        updateSta() {
            axios.get('/api/sta.php')
                .then((res) => {
            })
        }
    },
    mounted() {
        axios.get('/api/show.php')
            .then((res) => {
                const data = res.data
                this.visitNumer = data.visitNumber
            })
        axios
            .get('/api/data.json')
            .then((res) => {
                const data = res.data
                this.questions = data.questions
                this.results = data.results
                this.currentQuestions = this.questions[0]
            })
    }
}
</script>


<style lang="scss" scoped>
h1, h5{
    text-align: center;
    color: #fff;
}
.sta {
    font-size: 12px;
    color: #fff;
}
#survey {
    // height: 100vh;
    // background-image: linear-gradient(to top, #30cfd0 0%, #330867 100%);
    position: flex;
    top:0px;
    left:0px;
    width:100%;
    height:100%;
}

@media only screen and (max-width: 1024px) {
    .survey-wrap, .box-card{
        width: 80vw;
        margin: auto;
    }
    // button
    .button {
        line-height: 10px;
        width: 30vw;
        margin: auto;
    }
    .button-wrap {
        width: 60vw;
        margin: auto;
    }
}
@media only screen and (min-width: 1024px) {
    .survey-wrap, .box-card{
        width: 40vw;
        margin: auto;
    }
    // button
    .button {
        line-height: 10px;
        width: 15vw;
        margin: auto;
    }
    .button-wrap {
        width: 30vw;
        margin: auto;
    }
}

.question-wrap, .result-wrap{
    border-radius: 4px;
    background-color: rgba(0, 0, 0, .1);
    margin-bottom: 20px;
}


  
</style>
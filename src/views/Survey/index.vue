<template>
    <div class="columns survey">

        <div class="column col-12">
            <div class="card title">
                <h3>2019-nCov 境外自查表</h3>
                <h6 class="sta">总计使用人次: {{this.visitNumber}}</h6>
            </div>
        </div>

        <div class="column col-12">
            
            <div class="card">
                
                <div class="questions" v-if="display == 1">
                    <div class="card-header">
                        <div class="card-title h5">Question #{{this.currentQuestions.id}}</div>
                        <div class="card-subtitle text-gray">请如实回答该问题以获得更准确的结果</div>
                    </div>
                    <div class="card-body" v-html="this.currentQuestions.content">{{this.currentQuestions.content}}</div>
                    <div class="card-footer"><a class="btn btn-primary" @click="submitQuestion(1)">{{this.currentQuestions.btn1}}</a><a class="btn btn-primary" @click="submitQuestion(2)">{{this.currentQuestions.btn2}}</a></div>
                </div>

                <div class="answer" v-if="display == 2">
                    <div class="card-header">
                        <div class="card-title h5">Result #{{this.currentResult.id}}</div>
                        <div class="card-subtitle text-gray"></div>
                    </div>
                    <div class="card-body">{{this.currentResult.content}}</div>
                </div>

                
                <div class="divider text-center" data-content="进度" v-if="display == 1"></div>
            
                <div class="q-steps" v-if="display == 1">
                    <ul class="step">
                        <li class="step-item" :class="{'active': currentQuestions.id == value.id && display != 2}" v-for="(value) in questions" :key="value.id">
                            <a>Q{{value.id}}</a>
                        </li>
                    </ul>
                </div>

                <div class="divider text-center" data-content="操作" v-if="display == 2"></div>

                <div class="restart" v-if="display == 2">
                    <a class="btn btn-primary" @click="restart()">重新开始</a>
                </div>
            
            </div>
            
        </div>

        <div class="column col-12">
            <div class="card">
                <h6>注：内容均由 2019-ncoV 小战队成员 总结提供，若有最新消息请点击上方关于按钮联系我们，谢谢！</h6>
                <div>Copyright © 2020 <a href="http://www.jimschenchen.com">jimschenchen</a>, <a href="http://www.cloudyyoung.com/">CloudyYoung</a> from <a href="http://Meonc.studio">MeoncStudio</a>. All rights reserved.</div>
            </div>
        </div>

    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: "login",
    data() {
        return {
            currentQuestions: { id: 1, content: 'Loading', btn1: 'A 有', btn2: 'B 无', opt1: 2, opt2: 3},
            questions: [],
            currentResult: { id: 1, content: 'Loading'},
            results: [],
            display: 1,
            visitNumber: 0
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
                this.updateSta(result);
            }
        },
        restart() {
            this.currentQuestions = this.questions[0];
            this.display = 1;
        },
        updateSta(data) {
            axios.get('api/sta.php?rst='+data)
                .then((res) => {
            })
        }
    },
    mounted() {
        axios
            .get('api/data.json?' + Math.random())
            .then((res) => {
                const data = res.data
                this.questions = data.questions
                this.results = data.results
                this.currentQuestions = this.questions[0]
            })
        axios.get('api/sta.php')
            .then((res) => {
                this.visitNumber = res.data.visit;
        })
    }
}
</script>


<style lang="scss" scoped>
*{

}
</style>
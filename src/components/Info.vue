<template>
<div>
    <h1>2019-nCov境外信息表</h1>
    <el-card class="box-card">
        <div slot="header" class="clearfix">
            <span id="title">2019-nCov境外信息表</span>
        </div>
        <div class="block">
            <div class="radio">
                排序：
                <el-radio-group v-model="reverse">
                <el-radio :label="true">倒序</el-radio>
                <el-radio :label="false">正序</el-radio>
                </el-radio-group>
            </div>

            <el-timeline :reverse="reverse">
                <el-timeline-item
                v-for="(activity, index) in activities"
                :key="index"
                :icon="activity.icon"
                :type="activity.type"
                :color="activity.color"
                :size="activity.size"
                :timestamp="activity.timestamp">
                {{activity.content}}
                </el-timeline-item>
            </el-timeline>
        </div>
    </el-card>
</div>
</template>

<script>
import axios from 'axios'
export default {
    name: "Info",
    data() {
      return {
        reverse: false,
        activities: [{
          content: 'loading',
          timestamp: 'xxxx-xx-xx'
        }]
      };
    },
    mounted() {
        axios
            .get('/api/data.json')
            .then((res) => {
                const data = res.data
                this.activities = data.info
            })
        }
}
</script>

<style lang="scss" scoped>
h1 {
    text-align: center;
    color: #fff;
}
.block {
    width: 100%;
    margin: auto;
}
@media only screen and (max-width: 1024px) {
    .box-card{
        width: 80vw;
        margin: auto;
    }
}
@media only screen and (min-width: 1024px) {
    .box-card{
        width: 40vw;
        margin: auto;
    }
}
.radio {
    padding: 15px;
}
</style>
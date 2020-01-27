<template>
    <div class="columns info">

        <div class="column col-12">
            <div class="card title">
                <h3>信息中心</h3>
            </div>
        </div>

        <div class="column col-12">
            <div class="card">
                
                <div class="timeline">

                  <div class="timeline-item" v-for="(activity, index) in activities">
                    <div class="timeline-left"><a class="timeline-icon tooltip" :class="{'icon-lg': activity.size == 'large'}"></a></div>
                    <div class="timeline-content">
                      <div class="tile">
                        <div class="tile-content">
                          <p class="tile-subtitle">{{activity.timestamp}}</p>
                          <p class="tile-title">{{activity.content}}</p>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

            </div>
        </div>

    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: "Info",
    data() {
      return {
        reverse: false,
        activities: []
      };
    },
    mounted() {
        axios
            .get('api/data.json?' + Math.random())
            .then((res) => {
                const data = res.data
                this.activities = data.info
            })
        }
}
</script>

<style lang="scss" scoped>
*{

}
</style>
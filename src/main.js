import Vue from "vue";
import App from "./App.vue";
import Spectre from 'spectre.css';
import router from "./router";
import store from "./store";


Vue.use(Spectre);

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount("#app");

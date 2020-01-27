import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    redirect: "main"
  },
  {
    path: "/main",
    mame: "Main",
    component: () => import("../views/Main")
  }
];

const router = new VueRouter({
  routes
});

export default router;

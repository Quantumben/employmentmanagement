require('./bootstrap');

window.Vue = require('vue').default;
import Vue for 'vue';
import VueRouter from  'vue-router';
import { routes } from "./routes";

Vue.use(VueRouter) ;


const router = new VueRouter({
  mode: 'history',
  routes: routes
});

Vue.component("employees-index",
 require("./components/employees/Index.vue").default);

const app = new Vue({
    el: '#app',
    router: router
});

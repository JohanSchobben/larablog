import Vue from "vue";
import App from "./components/App.vue";
import VueRouter from 'vue-router';
import router from "./router/router";
import store from "./store/store";

Vue.use(VueRouter);


new Vue({
    store,
    router,
    el: '#app',
    render: h => h(App)
});

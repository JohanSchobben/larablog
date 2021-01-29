window.Vue = require('vue');

import App from "./components/App.vue";
import VueRouter from 'vue-router';
import router from "./router/router";

Vue.use(VueRouter);


const app = new Vue({
    router,
    el: '#app',
    render: h => h(App)
});

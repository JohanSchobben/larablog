import Vue from 'vue';
import Vuex from 'vuex';
import UserModule from "../user/user.store";
import BlogModule from "../blogs/blog.store";

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        user: UserModule,
        blog: BlogModule
    }
})

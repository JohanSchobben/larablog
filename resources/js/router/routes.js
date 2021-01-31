import Homepage from "../components/HomePage.vue";
import LoginPage from "../login/LoginPage.vue";
import RegisterPage from "../login/RegisterPage.vue";
import BlogPage from "../blogs/BlogPage.vue";

export default [
    {path: '/', component: Homepage},
    {path: '/login', component: LoginPage},
    {path: '/register', component: RegisterPage},
    {path: '/blogs', component: BlogPage}
];

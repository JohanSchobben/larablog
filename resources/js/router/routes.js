import Homepage from "../components/HomePage.vue";
import LoginPage from "../login/LoginPage.vue";
import RegisterPage from "../login/RegisterPage.vue";

export default [
    {path: '/', component: Homepage},
    {path: '/login', component: LoginPage},
    {path: '/register', component: RegisterPage}
];

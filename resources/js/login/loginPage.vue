<template>

    <div class="container mt-5">
        <div class="row h-100 justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h1>Login</h1>
                        <form @submit.prevent="login">
                            <small class="text-success" v-if="registrationSuccess">Je account is aangemaakt</small>
                            <small class="text-danger" v-if="showCredentialsWrong">Verkeerde combinatie email wachtwoord</small>
                            <div class="form-group mb-1">
                                <input class="form-control form-control-lg" v-model="form.email" type="text" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-lg" v-model="form.password" type="password" placeholder="wachtwoord">
                            </div>
                            <div class="d-flex justify-content-end mt-3 align-items-center">
                                <router-link class="font-weight-bolder mr-2" to="/register">Ik heb geen account</router-link>
                                <button class="btn btn-lg btn-success">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from "../common/axios";
    import Cookies from "js-cookie"
    export default {
        data(){
            return {
                form: {
                    email: "",
                    password: ""
                },
                showCredentialsWrong: false
            }
        },
        computed: {
            registrationSuccess(){
                return !!this.$router?.query?.registerSuccess;
            }
        },
        methods: {
            login(){
                axios.post('/api/login', {...this.form})
                    .then(response => {
                        Cookies.set("larablogtoken", response.data.token.token, {expires: 1});
                        this.$store.commit('setUser', response.data.user);
                        this.$router.push({path: "/blogs"})
                    })
                    .catch(err => {
                        console.log(err);
                        if (err.response.status === 401) {
                            this.showCredentialsWrong = true;
                        }
                    })
            }
        }
    }
</script>

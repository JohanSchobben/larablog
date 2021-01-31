<template>
    <div class="container mt-5">
        <div class="row h-100 justify-content-center">
            <div class="col-md=8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h1 class="card-title">Nieuw Account aanmaken</h1>
                        <form @submit.prevent="submit()">
                            <div class="form-group mb-2">
                                <input class="form-control form-control-lg" v-model="form.firstName" name="firstName" type="text" placeholder="Voornaam">
                                <small class="text-danger d-block mb-1" v-if="errors.firstName" v-for="error in errors.firstName">{{error}}</small>
                            </div>
                            <div class="form-group mb-2">
                                <input class="form-control form-control-lg" v-model="form.middleName" name="middleName" type="text" placeholder="Tussenvoegsel">
                                <small class="text-danger d-block mb-1" v-if="errors.middleName" v-for="error in errors.middleName">{{error}}</small>
                            </div>
                            <div class="form-group mb-2">
                                <input class="form-control form-control-lg" v-model="form.lastName" name="lastName" type="text" placeholder="Achternaam">
                                <small class="text-danger d-block mb-1" v-if="errors.lastName" v-for="error in errors.lastName">{{error}}</small>
                            </div>
                            <div class="form-group mb-2">
                                <input class="form-control form-control-lg" v-model="form.email" name="email" type="text" placeholder="Email">
                                <small class="text-danger d-block mb-1" v-if="errors.email" v-for="error in errors.email">{{error}}</small>
                            </div>
                            <div class="form-group mb-2">
                                <input class="form-control form-control-lg" v-model="form.password" type="password" placeholder="wachtwoord">
                                <small class="text-danger d-block mb-1" v-if="errors.password" v-for="error in errors.password">{{error}}</small>
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-lg" v-model="form.passwordConfirm" type="password" placeholder="wachtwoord bevestigen">
                            </div>
                            <div class="d-flex justify-content-end mt-3 align-items-center">
                                <router-link class="font-weight-bolder mr-2" to="/login">Ik heb al een account</router-link>
                                <button class="btn btn-lg btn-success">Registreren</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from "../common/axios"
    export default {
        data() {
            return {
                form: {
                    firstName: "",
                    middleName: "",
                    lastName: "",
                    email: "",
                    password: "",
                    passwordConfirm: ""
                },
                errors: {}
            }
        },
        methods: {
            submit(){
                axios.post('/api/register', {...this.form})
                    .then(response => {
                        this.$router.push({path: "login", query: {email: response.email, registerSuccess: true}})
                    })
                    .catch(err => {
                        this.errors = {...err.response.data.errors}
                    });
            }
        }
    }
</script>
cc

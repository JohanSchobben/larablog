<template>

    <div class="container mt-5">
        <div class="row h-100 justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h1>Login</h1>
                        <form>
                            <div class="form-group mb-1">
                                <input class="form-control form-control-lg" type="text" placeholder="gebruikersnaam">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="password" placeholder="wachtwoord">
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

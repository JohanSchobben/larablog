<template>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <router-link class="navbar-brand" to="/">Larablog</router-link>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <router-link class="nav-link" to="/">Home</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" to="/blogs">Blogposts</router-link>
                </li>
            </ul>
        </div>
        <router-link class="btn btn-outline-light" to="/login">Inloggen</router-link>
    </nav>
</template>

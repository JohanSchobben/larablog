<template>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{blog.title}}</h4>
            <p class="card-text">{{blog.intro}}</p>
            <div class="d-flex justify-content-end">
                <router-link class="btn btn-dark" :to="blogUrl"></router-link>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: [
            'blog'
        ],
        computed: {
            blogUrl(){
                return '/blogs/' + this.blog.slug
            }
        }
    }
</script>

<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <BlogList v-if="blogs.length" :blogs="blogs" />
                <div v-else class="d-flex align-items-center justify-content-center mt-5">
                    <span>Er zijn geen blogsposts</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Blogs</h4>
                        <router-link to="/blog/create">Schrijf een blog</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import BlogList from "./BlogList.vue";
    export default {
        components: {BlogList},
        created() {
            this.$store.dispatch('fetchBlogs');
        },
        computed:{
            blogs(){
                return this.$store.getters.getAllBlogs;
            }
        }
    }
</script>

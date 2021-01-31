<template>
    <div>Hello Blogs</div>
</template>
<script>
    export default {
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

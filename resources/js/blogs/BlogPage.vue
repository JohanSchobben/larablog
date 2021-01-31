<template>
    <div>
        Hello world!
    </div>
</template>
<script>
    export default {
        created(){
            this.$store.actions.dispatch('fetchBlogs');
        },
        data(){
            return {

            }
        },
        computed:{
            blogs(){
                return this.$store.getters('getBlogs');
            }
        }
    }
</script>

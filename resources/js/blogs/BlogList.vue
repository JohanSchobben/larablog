<template>
    <div class="d-flex flex-column">
        <BlogItem v-for="blog in blogs" :blog="blog" :key="blog.id"/>
    </div>
</template>
<script>
    import BlogItem from "./BlogItem.vue";
    export default {
        components: {BlogItem},
        props: [
            "blogs"
        ]
    }
</script>

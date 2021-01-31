import axios from "../common/axios"

export default {
    state: {
        blogs: []
    },
    getters:{
        getAllBlogs: state => state.blogs,
        getBySlug: state => slug => state.blogs.find(blog => blog.slug === slug)
    },
    mutations: {
        setBlogs: (state, payload) => state.blogs = [...payload],
        addContent: (state, payload) => {
            const blogsWithoutCurrent = state.blogs.filter(blog => blog.id !== payload.id);
            state.blogs = [...blogsWithoutCurrent, payload]
        }
    },
    actions: {
        fetchBlogs: context => {
            axios.get('/api/blogs')
                .then(response => {
                    context.commit('setBlogs', response.data)
                });
        }
    }
}

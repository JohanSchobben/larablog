export default {
    state: {
        user: undefined,
    },
    getters:{
        user: state => state.user
    },
    mutations: {
        setUser: (state, paylaod) => state.user = {...paylaod}
    },
}

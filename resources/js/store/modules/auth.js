// import { axios } from "vue/types/umd";

const state = {
    user: {},
    token: '',
    error: '',
};

const getters = {
    isAuthenticated: state => !!state.user,
    StateToken: state => state.token,
    StateUser: state => state.user,
    StateError: state => state.error,
};

const actions = {
    async register({}, form) {
        await axios.post('/api/register', {
            name: form.name,
            email: form.email,
            password: form.password
        })
    },

    async login({ commit }, user) {
        try {
            let data = await axios.post('/api/login', {
                email: user.email,
                password: user.password
            })
            await commit('setToken', data.headers.authorization)
        } catch (error) {
            // console.log(error.response.data.error);
            await commit('setError', error.response.data.error)
        }
    },


};
const mutations = {
    setToken(state, token) {
        state.token = token
    },
    setError(state, errorMess) {
        state.error = errorMess
    },
    // LogOut(state) {
    //     state.user = null
    //     state.posts = null
    // },
};

export default {
    state,
    getters,
    actions,
    mutations
};
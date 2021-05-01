import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const debug = process.env.NODE_ENV !== 'production';

export default new Vuex.Store({
    state: {
        posts: [],
        items: [],
    },

    actions: {
        async getAllPosts({ commit }) {
            return commit('setPosts', await api.get('/posts'))
        },

        async getAllItems({ commit }) {
            return commit('setItems', await api.get('/items'))
        },
    },

    mutations: {
        setPosts(state, response) {
            state.posts = response.data.data;
        },
        setItems(state, response) {
            state.items = response.data.data;
        },
    },
    strict: debug
});

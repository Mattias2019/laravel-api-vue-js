import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './views/App'
import Welcome from './views/Welcome'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Welcome
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: {App},
    router,
});


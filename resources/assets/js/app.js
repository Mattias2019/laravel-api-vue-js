import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './views/App'
import Welcome from './views/Welcome'
import Doctors from './components/Doctors.vue'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Welcome
        },
        {
            path: '/doctors',
            name: 'doctor',
            component: Doctors
        }
    ],
});

const app = new Vue({
    el: '#app',
    components: {App},
    router,
});


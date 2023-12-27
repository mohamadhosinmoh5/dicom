import './bootstrap';
import {createApp} from 'vue';
import {VueQueryPlugin} from "@tanstack/vue-query";
// import './app.css';
import App from './App.vue';
import router from './router.js';

createApp(App).use(router).use(VueQueryPlugin).mount('#app');
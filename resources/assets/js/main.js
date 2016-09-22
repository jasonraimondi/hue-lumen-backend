import Vue from 'vue';
import VueResource from 'vue-resource';

Vue.use(VueResource);

import App from './App.vue';
import '../sass/style.scss';

window.onload = () => {
    new Vue({
        el: '#app',
        components: {
            App: App,
        }
    });
};

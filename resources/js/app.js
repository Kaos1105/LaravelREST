
require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import router from './routes';
import Index from './Index.vue';
import moment from 'moment';
import SuccessOperation from './shared/components/SuccessOperation.vue';
import Vuex from 'vuex'
import storeDefinition from './store'

window.Vue = require('vue').default;
Vue.use(VueRouter);
Vue.use(Vuex);

const store = new Vuex.Store(storeDefinition);

Vue.filter('fromNow', (value) => {
    return moment(value).fromNow();
})
Vue.component('SuccessOperation', SuccessOperation);

const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        "index": Index
    },

    beforeCreate() {
        this.$store.dispatch('loadStoredLastSearch');
    }
});

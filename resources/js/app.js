
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue)

require('./bootstrap');

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'


import VueKonva from 'vue-konva'

Vue.use(VueKonva)


import Popover  from 'vue-js-popover'

Vue.use(Popover)

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


Vue.component('Exp', require('./components/Exp.vue').default);

Vue.component('rocket', require('./components/rocket.vue').default);


//Component used for testing how reactivity with vue can submit form data.
Vue.component('testing', require('./components/testing.vue').default);



Vue.component('editSuns', require('./components/editSuns.vue').default);
Vue.component('addPlanets', require('./components/addPlanets.vue').default);
Vue.component('addMoons', require('./components/addMoons.vue').default);





// A proto type of Galactic Center
// Vue.component('superMBH', require('./components/superMBH.vue').default);

//


// Each components lineage GalacticCenter->sun->planet->moon
Vue.component('GalacticCenter', require('./components/GalacticCenter.vue').default);
Vue.component('sun', require('./components/sun.vue').default);
Vue.component('planet', require('./components/planet.vue').default);
Vue.component('moon', require('./components/moon.vue').default);

Vue.component('stage', require('./components/stage.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data:{
        skills:[]
    }
});

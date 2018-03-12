
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Buefy from 'buefy'
import 'buefy/lib/buefy.css'

window.Vue = require('vue');

Vue.use(Buefy, {
    defaultIconPack: 'fas',
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component(Buefy.Checkbox.name, Buefy.Checkbox);
Vue.component(Buefy.Dropdown.name,Buefy.Dropdown);

const app = new Vue({
    el: '#app'
});



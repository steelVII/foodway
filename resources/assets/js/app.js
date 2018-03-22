
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Buefy from 'buefy';
import axios from 'axios';

window.Sticky = require('sticky-js');
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
Vue.component(Buefy.Collapse.name, Buefy.Collapse);
Vue.component(Buefy.Dropdown.name,Buefy.Dropdown);
Vue.component(Buefy.Tabs.name,Buefy.Tabs);
Vue.component(Buefy.Tooltip.name,Buefy.Tooltip);

Vue.component('restaurants', require('./components/RestaurantInfo.vue'));





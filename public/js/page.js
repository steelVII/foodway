/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(Buefy, {
    defaultIconPack: 'fas',
})

Vue.component(Buefy.Collapse.name, Buefy.Collapse);
Vue.component(Buefy.Dropdown.name,Buefy.Dropdown);

const app = new Vue({
    el: '#app'
});
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('articles', require('./components/Articles.vue').default);
Vue.component('sites', require('./components/SitesComponent.vue').default);
Vue.component('sitelist', require('./components/SiteListComponent.vue').default);

Vue.component('vendors', require('./components/VendorsComponent.vue').default);
Vue.component('monthlypayments', require('./components/MonthlyPayment.vue').default);

Vue.component('pagination', require('laravel-vue-pagination'));

Vue.component('navigations',require('./components/NavigationComponent.vue').default);
Vue.component('srprs',require('./components/SRPRComponent.vue').default);
Vue.component('srps',require('./components/SiteRentalPaymentComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    
});

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

Vue.component('vue-test', require('./components/mainPage/VueBladeHandlingTest.vue').default);
Vue.component('offers-left', require('./components/offers/OffersLeftBar.vue').default);
Vue.component('offers-middle-panel', require('./components/offers/OffersMiddlePanel.vue').default);
Vue.component('category-middle-panel', require('./components/offers/CategoryMiddlePanel.vue').default);
Vue.component('popup-button', require('./components/popup/PopupButton.vue').default);
Vue.component('partners', require('./components/mainPage/Partners.vue').default);
Vue.component('offers-left-middle-merged', require('./components/offers/OffersLeftMiddleMerged.vue').default);
Vue.component('main-page-search', require('./components/mainPage/MainPageSearch.vue').default);
Vue.component('accommodation-search', require('./components/accommodation/AccommodationSearch.vue').default);
Vue.component('accommodation-create', require('./components/accommodation/AccommodationCreate').default);
Vue.component('accommodation-edit', require('./components/accommodation/AccommodationEdit').default);
Vue.component('accommodation-index', require('./components/accommodation/AccommodationIndex.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

const app1 = new Vue({
    el: '#app1',
});

const app2 = new Vue({
    el: '#app2',
});
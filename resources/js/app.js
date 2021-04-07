/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('federacao-component', require('./components/FederacaoComponent.vue').default);
//Vue.component('pagination',require('laravel-vue-pagination'));
Vue.component('localizacao-component', require('./components/LocalizacaoComponent.vue').default);
Vue.component('cadastrarassociacao-component', require('./components/CadastrarAssociacaoComponent.vue').default);
Vue.component('caca-component', require('./components/CACComponent.vue').default);
Vue.component('cf-component', require('./components/ConsultarFederacaoComponent.vue').default);
Vue.component('cus-component', require('./components/Administrativo/Sistema/CusfComponent.vue').default);
Vue.component('caf-component', require('./components/Administrativo/Federacao/CAFComponent.vue').default);
Vue.component('capa-component', require('./components/Apas/ConsultarComponent.vue').default);
Vue.component('cac-component', require('./components/Clube/CadCluComponent.vue').default);
Vue.component('ccl-component', require('./components/Clube/ConsultarComponent.vue').default);









/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

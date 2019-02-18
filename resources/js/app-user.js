
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import VueRouter from 'vue-router';

window.Vue = require('vue');
window.Event = new Vue();

Vue.use(VueRouter);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

// for passport components
Vue.component('passport-clients', require('./components/passport/Clients.vue'));
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue'));
Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue'));

// todo component
Vue.component('todo-create', require('./components/todo/CreateComponent.vue'));
Vue.component('todo-update', require('./components/todo/UpdateComponent.vue'));

// Mission components
Vue.component('mission-details', require('./components/mission/DetailsComponent.vue'));

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const routes = [
    { path: '/', component: require('./components/HomeComponent.vue') },
    { path: '/todo', component: require('./components/todo/ListComponent.vue') },
    { path: '/mission', component: require('./components/mission/MissionComponent.vue') },
    { path: '/attendance', component: require('./components/attendance/AttendanceComponent.vue') },
    { path: '/passport', component: require('./components/PassportComponent.vue') },
];

const router = new VueRouter({
    linkExactActiveClass: 'is-active',
    linkActiveClass: 'active',
    routes // short for `routes: routes`
});

const app = new Vue({
    router
}).$mount('#app');

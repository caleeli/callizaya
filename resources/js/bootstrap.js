import { BootstrapVue } from 'bootstrap-vue';
import VueFontAwesomePicker from "vfa-picker";

window._ = require('lodash');
const Vue = window.Vue = require('vue');
window.moment = require('moment');
Vue.use(VueFontAwesomePicker);

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) { }

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.baseURL = "/api/data/";

/**
 * Get meta tag value
 * @param {string} name
 * @returns {string}
 */
function meta(name) {
    let tag = document.head.querySelector('meta[name="' + name + '"]');
    return tag ? tag.content : null;
}

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = meta('csrf-token');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

window.userId = meta('user-id') * 1;

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

let broadcasterHost = meta("broadcaster-host");
if (broadcasterHost) {
    window.io = require('socket.io-client');

    window.Echo = new Echo({
        broadcaster: 'socket.io',
        host: meta("broadcaster-host"),
        key: meta("broadcaster-key"),
    });
}

/**
 * Setup Vue Jdd Components
 */
const VueJddComponents = require('vue-jdd-components');
window.Vue.use(VueJddComponents.default, { jQuery: window.$ });
Vue.use(BootstrapVue);

// Load translations
Vue.mixin(require('./mixins/trans'));

/**
 * Config Vue-Router
 */
import VueRouter from 'vue-router';
Vue.use(VueRouter);
window.router = new VueRouter({
    routes: []
});

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./components/', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

/**
 * Modules
 */
const modules = require.context('./modules/', true, /\.vue$/i);
modules.keys().map(key => {
    const component = modules(key).default;
    const name = key.split('/').pop().split('.')[0];
    const path = component.path ? component.path : name;
    Vue.component(name, component);
    window.router.addRoutes([{ name: component.name || name, path, component, props: true }]);
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    router: window.router,
    el: '#app',
    mixins: [window.workflowMixin, window.ResourceMixin],
    data() {
        return {
            // Used to open the west menu in compact view
            westOpen: false,
            menus: [],
            me: this,
            user: this.$api.user.row(window.userId),
        };
    },
    computed: {
        isAdmin() {
            return this.user.id === 1;
        },
    },
    mounted() {
        window.axios.post(
            `user/${window.userId}`,
            {
                call: {
                    method: "allMenus",
                    parameters: {},
                }
            }
        ).then(response => {
            this.$set(this, 'menus', response.data.response);
            return response;
        });
    },
});

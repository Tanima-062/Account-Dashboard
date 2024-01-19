import './bootstrap';


import Layout from './Layouts/Default.vue'
import VueClickAway from "vue3-click-away";
import VCalendar from 'v-calendar';
import 'v-calendar/dist/style.css';


import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";


createInertiaApp({
    resolve: name => {
        const page = require(`./Pages/${name}`).default
        page.layout = page.layout || Layout
        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(VueClickAway)
            .use(VCalendar, {})
            .mixin({ methods: { route: window.route } })
            .mount(el);
    },
});

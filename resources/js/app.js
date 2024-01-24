import './bootstrap';


import Layout from './Layouts/Default.vue'
import VueClickAway from "vue3-click-away";


import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { ZiggyVue } from "ziggy";
import { Ziggy } from "./ziggy";


createInertiaApp({
    resolve: name => {
        const page = require(`./Pages/${name}`).default
        page.layout = page.layout || Layout
        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .mixin({ methods: { route: window.route } })
            .use(ZiggyVue, Ziggy)
            .use(plugin)
            .use(VueClickAway)
            .mount(el);
    },
});


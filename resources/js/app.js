import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'

const app = createInertiaApp({
    resolve: name => import(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el)
    },
});




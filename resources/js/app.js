import './bootstrap';
import '../sass/app.scss';

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mixin({
                methods: {
                    __(key, replace = {}) {
                        var translation = this.$page.props.language[key]
                            ? this.$page.props.language[key]
                            : key
                        Object.keys(replace).forEach(function (key) {
                            translation = translation.replace(':' + key, replace[key])
                        });
                        return translation
                    },
                },
            })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });

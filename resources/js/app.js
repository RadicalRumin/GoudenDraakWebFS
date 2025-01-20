import './bootstrap';

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import PrimeVue from 'primevue/config';

import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

import { faBowlFood, faCartShopping, faCoffee, faIceCream, faUser, faXmark, faPlus } from '@fortawesome/free-solid-svg-icons';
import { faGithub } from '@fortawesome/free-brands-svg-icons';

library.add(
    faCoffee,
    faUser,
    faGithub,
    faCartShopping,
    faBowlFood,
    faIceCream,
    faPlus,
    faXmark
);

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(PrimeVue, {
                unstyled: true,
            })
            .component('font-awesome-icon', FontAwesomeIcon)
            .mount(el)
    },
})
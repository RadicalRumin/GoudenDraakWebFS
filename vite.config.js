import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'
import Components from 'unplugin-vue-components/vite';
import { PrimeVueResolver } from '@primevue/auto-import-resolver';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/**' , 'resources/js/**'],
            refresh: true,
        }),
        Components({
            resolvers: [
                PrimeVueResolver()
            ]
        })
    ],
});

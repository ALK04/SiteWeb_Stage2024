import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/main.scss', // Front SCSS
                'public/js/app.js', // Front JS
            ],
            refresh: true,
        }),
    ],
});

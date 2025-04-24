import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        hmr: {
        host: 'localhost',  // Pastikan menggunakan host yang sesuai
         // Pastikan port tidak konflik dengan aplikasi lain
        },
    },
});

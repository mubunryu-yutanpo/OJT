import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: '0.0.0.0',
        port: 5173,//5173
        hmr: {
            host: 'localhost',
        },

        watch: {
            usePolling: false,
            // usePolling: true, // falseで動作しない場合はtrueにする
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/sass/app.scss',
                'resources/js/app.js',
                'resources/ts/image-preview.ts',
                'resources/ts/text-counter.ts',
            ],
            refresh: true,
        }),
    ],
});

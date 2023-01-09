import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/admin.js',
                'resources/js/game.js',
                'resources/js/getAchievements.js',
                'resources/js/header.js',
                'resources/js/labelForLogin.js',
                'resources/js/labelForRegister.js',
                'resources/js/main.js',
            ],
            refresh: true,
        }),
    ],
});

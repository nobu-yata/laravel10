import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/scss/common/_variables.scss',
                'resources/scss/common/button.scss',
                'resources/scss/common/default.scss',
                'resources/scss/common/forms.scss',
                'resources/scss/common/message.scss',
                'resources/scss/common/table.scss',
                'resources/scss/common/_variables.scss',
                'resources/scss/common/text.scss',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});

import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            width: {
                'custom': '650px', // Menambahkan lebar kustom 400px
                'custom-2': '1400px', // Menambahkan lebar kustom 500px
                'custom-3': '600px', // Menambahkan lebar kustom 600px
              },
            colors: {
                'primary': '#006980',
                'buttonH': '#005669',
                'buttonA': '#006980',
                'gradient1': '#0098B9',
                'gradient3': '#003844',
                'gradient2': '#FFFFFF',
                'txt': '#006B82',
                'icon': '#FFB800',
                'iconHH': '#E9A800',
                'iconH': '#FFEF09',
                'background': '#0098B9',
            },  
            fontFamily: {  
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};

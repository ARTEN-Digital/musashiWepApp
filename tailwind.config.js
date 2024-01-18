import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                primaryColor: '#a73535',  //red
                secundaryColor: '#fcfcfc',   // white
                blueColor: 'rgb(0, 140, 197)',
                greenColor: 'rgb(38, 143, 76)',
                pinkColor: 'rgb(251, 105, 135)',
                purpleColor: 'rgb(144, 122, 175)',
                orangeblueColor: 'rgb(240, 131, 0)',
            },
        },
    },

    plugins: [forms, typography],
};

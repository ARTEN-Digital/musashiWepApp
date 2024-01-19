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
                sans: ['Helvetica', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                primaryColor: '#ee1d23',  //red
                secundaryColor: '#fcfcfc',   // white
                grayColor: '#9fa0a0',
                blueColor: 'rgb(0, 140, 197)',
                greenColor: 'rgb(38, 143, 76)',
                pinkColor: 'rgb(251, 105, 135)',
                purpleColor: 'rgb(144, 122, 175)',
                orangeColor: 'rgb(240, 131, 0)',
            },
            width:{
                '60p': '60%',
                '38p': '38%',

                '23p': '23%',
                '75p': '75%',

                
            }
        },
    },

    plugins: [forms, typography],
};

import defaultTheme from 'tailwindcss/defaultTheme'
import forms from '@tailwindcss/forms'
import typography from '@tailwindcss/typography'

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],

    theme: {
        container: {
            center: true,
            padding: {
                DEFAULT: '1rem',
                sm: '1.5rem',
                lg: '2rem',
                xl: '2.5rem',
            },
        },

        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                primary: '#2563eb', // blue-600
                dark: '#0f172a',    // slate-900
            },
        },
    },

    plugins: [
        forms,
        typography,
    ],
}

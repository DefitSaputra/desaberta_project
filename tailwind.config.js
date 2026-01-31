import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Palet Earth Tones Desa Berta
                berta: {
                    dark: '#1C290D',
                    olive: '#676F53',
                    sage: '#B3B49A',
                    cream: '#FEFAE0',
                    taupe: '#A19379',
                    wood: '#736046',
                    coffee: '#381D03',
                }
            },
            // TAMBAHKAN BAGIAN INI UNTUK ANIMASI SLIDER
            animation: {
                'fade-in-up': 'fadeInUp 1s ease-out forwards',
            },
            keyframes: {
                fadeInUp: {
                    '0%': { opacity: '0', transform: 'translateY(20px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                }
            }
        },
    },
    plugins: [],
};
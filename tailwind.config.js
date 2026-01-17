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
                // Palet "Earth Tones" Desa Berta (Wajib Ada!)
                berta: {
                    dark: '#1C290D',    // Background Utama (Hutan Gelap)
                    olive: '#676F53',   // Aksen Utama (Hijau Zaitun)
                    sage: '#B3B49A',    // Teks Sekunder (Hijau Pudar)
                    cream: '#FEFAE0',   // Teks Utama (Krem Terang)
                    taupe: '#A19379',   // Variasi Coklat
                    wood: '#736046',    // Aksen Kayu
                    coffee: '#381D03',  // Coklat Gelap
                }
            }
        },
    },
    plugins: [],
};
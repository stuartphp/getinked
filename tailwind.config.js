const colors = require('tailwindcss/colors')

module.exports = {
  purge: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './vendor/laravel/jetstream/**/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    screens:{
        sm: '567px',
        md: '768px',
        lg: '992px',
        xl: '1200px'
    },
    container: {
        center: true,
        padding: '1rem',
    },
    extend: {
        fontFamily: {
            poppins: "'Poppins', sans-serif",
            roboto: "'Roboto', sans-serif",
        },
        colors: {
            'primary': '#FD3D57'
        },
    },
  },
  variants: {
    extend: {
        display: ['group-hover'],
    },
  },
  plugins: [],
}

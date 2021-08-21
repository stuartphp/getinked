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

      },
    extend: {
        fontFamily: {
            poppins: "'Poppins', sans-serif",
            roboto: "'Roboto', sans-serif",
        }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}

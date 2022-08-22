/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      screens: {
        'zero': '0px',
        // => @media (min-width: 0px) { ... }

        'phone': '320px',
        // => @media (min-width: 320px) { ... }

        'tablet': '640px',
        // => @media (min-width: 640px) { ... }

        'tablet-xl': '768px',
        // => @media (min-width: 768px) { ... }

        'laptop': '1024px',
        // => @media (min-width: 1024px) { ... }

        'desktop': '1280px',
        // => @media (min-width: 1280px) { ... }

        'desktop-xl': '1536px',
        // => @media (min-width: 1536px) { ... }

        'desktop-4k': '2560px',
        // => @media (min-width: 1536px) { ... }
      },
    },
    colors: {
      'bg' : '#151515',
      'main' : '#7AA973',
      'addictive' : '#A99D73',
      'card_bg' : '#1B1B1B',
      'white' : '#DADADA',
      'dark' : '#282828',
      'subwhite' : '#6F6F6F',
      'red' : '#991D1D',
      'green' : '#2E991D',
      'yellow' : '#97991D',
    }
  },
  plugins: [require("daisyui")],
}

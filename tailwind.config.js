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

        'bigger': '2560px',
        // => @media (min-width: 1536px) { ... }
      },
    },
    colors: {
      'bg' : '#161616',
      'main' : '#37C564',
      'addictive' : '#FADB5F',
      'card_bg' : '#1B1B1B',
      'white' : '#DADADA',
      'subwhite' : '#a7a7a7',
      'dark' : '#282828',
      'red' : '#C53737',
      'green' : '#3F9142',
      'yellow' : '#97991D',
    }
  },
  plugins: [require("daisyui")],
  daisyui: {
    styled: true,
  },
}

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    container: {
      center: true,
    },
    colors: {
      'bg' : '#161616',
      'main' : '#37C564',
      'addictive' : '#FADB5F',
      'card_bg' : '#1f1f1f',
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

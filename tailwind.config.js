/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    'node_modules/daisyui/dist/**/*.js',
    'node_modules/react-daisyui/dist/**/*.js',
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
      'subwhite' : '#979797',
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

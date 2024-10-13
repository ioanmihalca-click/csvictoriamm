/** @type {import('tailwindcss').Config} */

export default {
  presets: [preset],
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",

  ],
  theme: {
    extend: {
      fontFamily: {
        'roboto-condensed': ['"Roboto Condensed"', 'sans-serif'],
        
      },
    },
  },
  plugins: [],
}


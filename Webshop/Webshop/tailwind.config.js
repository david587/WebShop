/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{html,ts}",
  ],
  theme: {
    colors: {
      'lightGray': "#999999",
      'deepForest': '#243c5a',
      'gray':'#9B9B93',
      'neon': '#E33926',
      'white': '#ffff',
      'deepForest': {
        100: '#cffafe',
        200: '#a5f3fc',
        300: '#67e8f9',
        400: '#22d3ee',
        500: '#06b6d4',
        600: '#0891b2',
        700: '#0e7490',
        800: '#243c5a',
        900: '#122021'
      }
    },
    screens:{
      "sm": "480px",
      "md":"768px",
      "lg":"976px",
      "xl": "1440px"
    },
    extend: {},
  },
  plugins: [],
}

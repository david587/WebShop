/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{html,ts}",
  ],
  theme: {
    extend: {
      backgroundImage: {
        'hero': "url('./img/background_image.jpg')"
      },
      colors: {
        'white': '#ffffff',
        'darkgray': '#313638',
        'deepForest': '#243c5a',
        'gray': '#EEEEEE',
        'neon':'#84cc16',
        'deepForest': {
          100: '#cffafe',
          200: '#a5f3fc',
          300: '#67e8f9',
          400: '#22d3ee',
          500: '#06b6d4',
          600: '#0891b2',
          700: '#233b58',
          800: '#243c5a',
          900: '#122021',
          1000:'#070d0d'
        },
      }
    },
  },
  plugins: [],
}

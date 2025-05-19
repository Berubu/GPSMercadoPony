/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}/** @type {import('tailwindcss').Config} */

module.exports = {
  mode: 'jit',
  content: [
    "./src/**/*.{js,jsx,ts,tsx}",'./src/**/*.{js,jsx,ts,tsx}', './public/index.html'
  ],
  theme: {
    extend: {
      colors: {
        'custom-blue': '#00002D',
        'custom-gray': '#222222',
        'custom-red' : '#53102D',
        'custom-white': '#D9D9D9',
        'custom-wine': '#53102D',
      },
    },
  },
  plugins: [],
};

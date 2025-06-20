/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        chineseTakeaway: ['"chinese_takeawayregular"', "sans-serif"],
        // Add more custom font families as needed
      },
    },
  },
  plugins: [],
}
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php", // All PHP files in the theme root
    "./template-parts/**/*.php", // Optional: scan template parts if using them
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
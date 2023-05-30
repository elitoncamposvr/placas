/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./views/**/*.php"],
  theme: {
    extend: {
      width: {
        '128': '32rem',
        '136': '34rem',
        '140': '36rem',
        '160': '40rem',
      }
    },
  },
  plugins: [],
}



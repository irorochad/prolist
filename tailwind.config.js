/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: "class",
  content: [
    "./*.html",
    "./*.php",
    "./includes/**/*.{html,js,php}",
    "./account/**/*.{html,js,php}",
  ],
  theme: {
    extend: {
      colors: {
        lightMode: "#F5F8FF",
        dakrMode: "#0F172A",
        brandBlue: "#1D4ED8",
        brandLIGHT: "#FCFDFE",
        darkBox: "#77325f2d",
      },
      screens: {
        sm: "480px",
        md: "768px",
        lg: "1024px	",
        xl: "1280px",
      },
      fontFamily: {
        Poppins: "Poppins, sans-serif",
        Montserrat: "Montserrat, sans-serif",
      },
      widths: {
        30: "5rem",
      },
    },
  },
  variants: {
    display: ["group-hover"],
  },
  plugins: [],
};

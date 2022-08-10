/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: "class",
  content: ["./public/**/*.{html,js,php}", "./src/**/*.{html,js,php}"],
  // content: [
  //   "./*.html",
  //   "./*.php",
  //   "./src/**/*.{html,js,php}",
  // ],
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
        // Comma-delimited format:
        Poppins: "Poppins, sans-serif",
        Montserrat: "Montserrat, sans-serif",
        
      },
    },
  },
  plugins: [],
};

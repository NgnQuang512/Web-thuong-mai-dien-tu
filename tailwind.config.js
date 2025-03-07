/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: "jit",
  content: ["./**/*.html", "./**/*.{php,js,jsx,ts,tsx,vue}"],
  theme: {
    extend: {
      boxShadow: {
        menu: "0 1px 2px 0 #3c40431a, 0 2px 6px 2px #3c404326",
        form: "inset 0 .0625em .125em hsla(0, 0%, 4%, .05)",
        price: "0 4px 4px rgba(255,0,0,.15),0 -1px 1px rgba(255,0,0,.15)",
        formComment: "0 0 10px 0 #3c40431a, 0 2px 6px 2px #3c404326",
      },
      keyframes: {
        fadeInLogin: {
          "0%": { background: "#0a0a0adb" },
          // "0%" : {opacity:"1"},
          "100%": { background: "rgba(0, 0, 0, 0.7)" },
        },
        fadeInForm: {
          "0%": { opacity: ".8" },
          "100%": { opacity: "1" },
        },
      },
    },
    animation: {
      fadeInLogin: "fadeInLogin .5s ease-in forwards",
      fadeInForm: "fadeInForm .5s ease-in forwards",
    },
  },
  plugins: [],
};

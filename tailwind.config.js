/** @type {import('tailwindcss').Config} */

/* Preline UI */
@import "../../node_modules/preline/variants.css";
@source "../../node_modules/preline/dist/*.js";
export default {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js", "./resources/**/*.vue"],
    theme: {
    extend: {},
    },
    plugins: [
        require('preline/plugin')
    ],
}

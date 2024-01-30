import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./src/**/*.{html,js,vue,css,php}",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./index.html",
        "./src/**/*.{vue,js,ts,jsx,tsx}",
    ],

    theme: {},

    plugins: [forms],
};

// ***************************************************
// /** @type {import('tailwindcss').Config} */
// export default {
//     content: ["./src/**/*.{html,js,vue,css,php}"],
//     theme: {},
//     plugins: [],
// };

// // tailwind.config.js
// module.exports = {
//     purge: ["./index.html", "./src/**/*.{vue,js,ts,jsx,tsx}"],
//     darkMode: false, // or 'media' or 'class'
//     theme: {
//         extend: {},
//     },
//     variants: {
//         extend: {},
//     },
//     plugins: [],
// };

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./*.php",
        "./**/*.php",
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/line-clamp'),
    ],
}
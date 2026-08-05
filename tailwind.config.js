/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./**/*.php",
        "./src/**/*.vue",
        "./blocks/**/*.php"

    ],
    corePlugins: {
        preflight: false
    },
    theme: {
        extend: {},
    },
    plugins: [],
}
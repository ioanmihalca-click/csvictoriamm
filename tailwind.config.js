/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./app/Filament/**/*.php",
        "./resources/views/filament/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                "roboto-condensed": ['"Roboto Condensed"', "sans-serif"],
            },
        },
    },
    plugins: [require("@tailwindcss/typography")],
};

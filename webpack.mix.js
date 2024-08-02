const mix = require("laravel-mix")
require('mix-tailwindcss');
mix.setPublicPath(__dirname);
mix.sass("assets/src/style.scss", "assets/dist/css")
    .tailwind("./tailwind.config.js")
    .sourceMaps()
    .version()
    .disableNotifications();
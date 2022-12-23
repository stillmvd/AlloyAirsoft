let mix = require('laravel-mix')

mix.js("resources/js/admin.js", "public/js");
mix.js("resources/js/game.js", "public/js");
mix.js("resources/js/getAchievements.js", "public/js");
mix.js("resources/js/header.js", "public/js");
mix.js("resources/js/labelForLogin.js", "public/js");
mix.js("resources/js/labelForRegister.js", "public/js");
mix.js("resources/js/main.js", "public/js");
mix.postCss("resources/css/app.css", "public/css", [require("tailwindcss")]);
mix.postCss("resources/css/style.css", "public/css");

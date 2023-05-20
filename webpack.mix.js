let mix = require('laravel-mix');


mix.js('public/js/admin.js', 'build').setPublicPath('./public/build');
mix.js('public/js/getAchievements.js', 'build').setPublicPath('./public/build');
mix.js('public/js/header.js', 'build').setPublicPath('./public/build');
mix.js('public/js/labelForLogin.js', 'build').setPublicPath('./public/build');
mix.js('public/js/labelForRegister.js', 'build').setPublicPath('./public/build');
mix.js('public/js/main.js', 'build').setPublicPath('./public/build');

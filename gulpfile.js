var elixir = require('laravel-elixir');

/*
 |----------------------------------------------------------------
 | Have a Drink!
 |----------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic
 | Gulp tasks for your Laravel application. Elixir supports
 | several common CSS, JavaScript and even testing tools!
 |
 */

elixir.config.css.autoprefix = {
    enabled: true
};

elixir(function(mix) {
    mix.sass('app.scss', 'public/css/')
        .sass('home.scss', 'public/css/')
        .scripts('./resources/assets/js/app.js', 'public/js/app.js', './')
        .version(['css/app.css', 'js/app.js', 'css/home.css']);
});

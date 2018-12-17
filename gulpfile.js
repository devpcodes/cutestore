var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.scripts(['lib/jquery_ui/jquery.easing.1.3.js','lib/jquery_ui/jquery-ui.min.js',
    'lib/jquery_ui/jquery.ui.touch-punch.js','home/carousel.js','lib/loading/jquery.center.js',
    'lib/loading/jquery.loading.js','home/home.js','fastaddcart.js']);
});

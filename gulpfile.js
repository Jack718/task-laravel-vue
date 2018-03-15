var elixir = require('laravel-elixir');
require('laravel-elixir-vue-2');
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
    mix.sass('app.scss')
        .scripts([
            'charts/Chart.min.js',
            'charts/pie.js',
            'charts/bar.js'
            ],'public/js/chart.js')
        .webpack('vue/app.js','public/js/step.js');
    mix.copy("node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js","public/js/app.js")
});

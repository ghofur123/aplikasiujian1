const mix = require('laravel-mix');
require('datatables.net');
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
require('jquery');
mix.js([

    //
    'public/assets/js/dashboard.js',
    'resources/js/app.js',

    //

], 'public/js/app.js').postCss('resources/css/app.css', 'public/css/app.css', []);
mix.sass('resources/sass/app.scss', 'public/css/app.css');
mix.css('public/assets/css/app.css', 'public/css/app.css');

let mix = require('laravel-mix');

var paths = {
    'bootstrap':        './node_modules/bootstrap/',
    'dateTimePicker':   './node_modules/bootstrap-datepicker/dist/',
    'modernizr':        './node_modules/modernizr/',
    'moment':           './node_modules/moment/',
    'momentTimezone':   './node_modules/moment-timezone/',
    'restfulizer':      './node_modules/restfulizerjs/'
};


/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix

    // Compile SASS files
    .sass('resources/themes/bootstrap/sass/app.scss', 'public/build/bootstrap/css/app.css')

    .combine([
        'public/build/bootstrap/css/app.css',
        paths.dateTimePicker + 'css/bootstrap-datepicker.css',
    ], 'public/bootstrap/css/app.css')

    // Combine Javascript files
    .scripts([
        paths.moment + 'moment.js',
        paths.dateTimePicker + 'js/bootstrap-datepicker.js',
        paths.restfulizer + 'jquery.restfulizer.js',
    ], 'public/build/bootstrap/js/bootstrap.js')

    // Compile Javascript resources
    .js([
        'resources/themes/bootstrap/js/app.js',
        'public/build/bootstrap/js/bootstrap.js'
    ], 'public/bootstrap/js/app.js')

    // Combine stylesheets
    // .styles([
    //     './resources/themes/bootstrap/css/app.css'
    // ], 'public/bootstrap/css/app.css')

    // Version stylesheet and javascript file
    .version();

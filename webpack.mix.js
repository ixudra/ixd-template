const { mix } = require('laravel-mix');

var paths = {
    'bootstrap':        './node_modules/bootstrap-sass/assets/',
    'dateTimePicker':   './node_modules/eonasdan-bootstrap-datetimepicker/src/',
    'jquery':           './node_modules/jquery/',
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
    .sass('resources/assets/bootstrap/sass/app.scss', 'public/bootstrap/css/app.css')

    // Copy fonts to public directory
    .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/bootstrap/fonts')

    // Combine Javascript files
    .js([
        paths.jquery + "dist/jquery.js",
        paths.bootstrap + "javascripts/bootstrap.js",
        paths.moment + "moment.js",
        paths.dateTimePicker + "js/bootstrap-datetimepicker.js",
        paths.restfulizer + "jquery.restfulizer.js",
        "resources/assets/bootstrap/js/app.js"
    ], 'public/bootstrap/js/app.js', './')

    // Combine stylesheets
    // .combine([
    //     "./resources/assets/bootstrap/css/app.css"
    // ], 'public/bootstrap/css/app.css')

    // Version stylesheet and javascript file
    .version();

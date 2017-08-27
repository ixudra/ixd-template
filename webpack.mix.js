let mix = require('laravel-mix');

var paths = {
    'dateTimePicker':   './node_modules/eonasdan-bootstrap-datetimepicker/src/',
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
    .scripts([
        paths.moment + "moment.js",
        paths.dateTimePicker + "js/bootstrap-datetimepicker.js",
        paths.restfulizer + "jquery.restfulizer.js"
    ], 'public/build/js/bootstrap.js')

    // Compile Javascript resources
    .js([
        "resources/assets/bootstrap/js/app.js",
        'public/build/js/bootstrap.js'
    ], 'public/bootstrap/js/app.js')

    // Combine stylesheets
    // .styles([
    //     "./resources/assets/bootstrap/css/app.css"
    // ], 'public/bootstrap/css/app.css')

    // Version stylesheet and javascript file
    .version();

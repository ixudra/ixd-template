var elixir = require('laravel-elixir');

var paths = {
    'bootstrap':        './node_modules/bootstrap-sass/assets/',
    'dateTimePicker':   './node_modules/eonasdan-bootstrap-datetimepicker/src/',
    'jquery':           './node_modules/jquery/',
    'modernizr':        './node_modules/modernizr/',
    'moment':           './node_modules/moment/',
    'momentTimezone':   './node_modules/moment-timezone/',
    'restfulizer':      './node_modules/restfulizerjs/'
};

elixir(function(mix) {
    mix

        // Compile SASS files
        .sass([
                'app.scss'
            ], 'resources/assets/css/app.css')

        // Copy fonts to public directory
        .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts')

        // Combine Javascript files
        .scripts([
            paths.jquery + "dist/jquery.js",
            paths.bootstrap + "javascripts/bootstrap.js",
            paths.moment + "moment.js",
            paths.dateTimePicker + "js/bootstrap-datetimepicker.js",
            paths.restfulizer + "jquery.restfulizer.js",
            "resources/assets/js/app.js"
        ], 'public/js/app.js', './')

        // Combine stylesheets
        .styles([
            "app.css"
        ], 'public/css/app.css')

        // Version stylesheet and javascript file
        .version(["css/app.css", "js/app.js"]);
});

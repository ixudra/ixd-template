var elixir = require('laravel-elixir');

var paths = {
    'bootstrap':        './vendor/bower_components/bootstrap-sass/vendor/assets/',
    'dateTimePicker':   './vendor/bower_components/eonasdan-bootstrap-datetimepicker/src/',
    'jquery':           './vendor/bower_components/jquery/',
    'jqueryUi':         './vendor/bower_components/jquery-ui/',
    'modernizr':        './vendor/bower_components/modernizr/',
    'moment':           './vendor/bower_components/moment/',
    'momentTimezone':   './vendor/bower_components/moment-timezone/',
    'restfulizer':      './vendor/bower_components/restfulizer/'
};

elixir(function(mix) {
    mix

        // Compile SASS files
        .sass("app.scss", 'resources/assets/css/app.css', {
            includePaths: [
                paths.bootstrap + 'stylesheets/',
                paths.dateTimePicker + 'sass/',
            ]
        })

        // Copy fonts to public directory
        .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts')

        // Combine Javascript files
        .scripts([
            paths.jquery + "dist/jquery.js",
            paths.jqueryUi + "jquery-ui.js",
            paths.bootstrap + "javascripts/bootstrap/*.js",
            paths.moment + "moment.js",
            paths.dateTimePicker + "js/bootstrap-datetimepicker.js",
            paths.restfulizer + "jquery.restfulizer.js",
            "resources/assets/js/app.js"
        ], 'public/js/app.js', './')

        // Combine stylesheets
        .styles([
            paths.jqueryUi + "base/*.css",
            "app.css"
        ], 'public/css/app.css')

        // Version stylesheet and javascript file
        .version(["css/app.css", "js/app.js"]);
});

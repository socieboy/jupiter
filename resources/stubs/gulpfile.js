var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

/**
 * Dependencies
 *
 *  bower install admin-lte -s
 *  bower install font-awesome -s
 *  bower install alertify-js -s
 */

elixir(function(mix) {

     //Copy bootstrap and AdminLTE CSS files to public directory
    mix.copy('bower_components/AdminLTE/bootstrap/css/bootstrap.css', 'public/libs/css/bootstrap.css');
    mix.copy('bower_components/AdminLTE/dist/css/AdminLTE.css', 'public/libs/css/admin-lte.css');
    mix.copy('bower_components/AdminLTE/dist/css/skins/_all-skins.css', 'public/libs/css/admin-lte-skin.css');
    mix.copy('bower_components/AdminLTE/dist/js/app.js', 'public/libs/js/admin-lte.js');

    // Copy fonts from Glypicons
    mix.copy('bower_components/AdminLTE/bootstrap/fonts', 'public/fonts');
    mix.copy('bower_components/AdminLTE/bootstrap/fonts', 'public/fonts');

    // Font Awesome
    mix.copy('bower_components/font-awesome/css/font-awesome.css', 'public/libs/css/font-awesome.css');
    mix.copy('bower_components/font-awesome/fonts', 'public/fonts');
    mix.copy('bower_components/font-awesome/fonts', 'public/fonts');

    // AlertifyJS
    mix.copy('bower_components/alertify-js/build/css/alertify.css', 'public/libs/css/alertify.css');
    mix.copy('bower_components/alertify-js/build/css/themes/default.css', 'public/libs/css/alertify-theme.css');
    mix.copy('bower_components/alertify-js/build/alertify.js', 'public/libs/js/alertify.js');

    // Custom Scripts
    mix.less('app.less', 'public/libs/css/');
    mix.browserify('app.js', 'public/libs/js/')

    // Merge all CSS files in one file.
    mix.styles([
        'bootstrap.css',
        'admin-lte.css',
        'admin-lte-skin.css',
        'font-awesome.css',
        'alertify.css',
        'alertify-theme.css',
        'app.css',
    ], './public/css/min.css', './public/libs/css');


    // Merge all JS  files in one file.
    mix.scripts([
        'app.js',
        'admin-lte.js',
        'alertify.js',
    ], './public/js/min.js', './public/libs/js');

});
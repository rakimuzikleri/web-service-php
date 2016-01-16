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
/**
 * npm install --global gulp
 * run "gulp" command after installation
 */


/**
 * combine all css files.
 */
elixir(function(mix) {
    mix.styles([
        "picto.css",
        "bootstrap.css",
        "animate.min.css",
        "font-awesome.min.css"
    ], 'public/css/everything.css', 'public/css');
});

/**
 * combine all js files.
 */
elixir(function(mix) {
    mix.scripts([
        "holder.js",
        "modernizr.js",
        "jquery.min.js",
        "jquery-migrate.min.js",
        "modernizr.js",
        "less.min.js",
        "excanvas.js",
        "ie.prototype.polyfill.js"
    ], 'public/js/everything.js','public/js');
});


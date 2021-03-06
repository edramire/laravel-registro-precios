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
    //css
    mix.sass('app.scss');

    //para font awesome
    mix.copy('node_modules/font-awesome/fonts','public/build/fonts');

    //js
    //usar browserify

    //versionar
    mix.version([
      //'js/app.js',
      'css/app.css'
    ]);

});

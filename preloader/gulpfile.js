var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.scripts([
        'src/jquery.preloader.js'
    ], 'dist/jquery.preloader.min.js', __dirname);

    mix.less([
        '/examples.less'
    ], 'demo/examples.css');
});
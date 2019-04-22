const mix = require('laravel-mix');

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

mix.copy(
  ['node_modules/requirejs/require.js'],
  'public/js/vendor/require.js'
);

mix.copy(
   ['node_modules/conekta/lib/conekta.js'],
   'public/js/vendor/conekta/conekta.js'
);

mix.copy(
   ['node_modules/conekta/lib/resources/Order.js'],
   'public/js/vendor/conekta/resources/Order.js'
);

mix.js('resources/js/conekta_example/form.js', 'public/js/conekta_example');

mix.js('resources/js/app.js', 'public/js').extract([
  'lodash',
  'popper.js',
  'bootstrap',
  'jquery',
  'axios',
]);

mix.sass('resources/sass/app.scss', 'public/css');

if (mix.inProduction()) {
    mix.version();
} else {
    mix.webpackConfig({ devtool: 'inline-source-map' });
}

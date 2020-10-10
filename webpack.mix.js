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

if (!mix.inProduction()) {
    mix.js('resources/js/app.js', 'public/js')
        .extract()
        .sass('resources/sass/app.scss', 'public/css')
        .sourceMaps()
        .version();

    mix.webpackConfig({
        devtool: 'inline-source-map'
    });
} else {
    mix.js('resources/js/app.js', 'public/js')
        .extract()
        .sass('resources/sass/app.scss', 'public/css')
        .version();
}

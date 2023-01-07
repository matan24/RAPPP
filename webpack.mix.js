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

 //browser tidak dapat membaca aap.scss maka harus ada compilernya
//webpack.mix.js ( laravel mix ) inilah yang mengcompiler app.scss sehingga browsur bisa membaca tampilan dari laravel ui yang menggunakan bootstrap

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();

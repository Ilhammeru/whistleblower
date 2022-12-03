const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);

mix.webpackConfig({
    output: {
      library: 'libraryName',
      libraryTarget: 'umd',
      umdNamedDefine: true, // optional
      globalObject: 'this' // optional
    }
  });
  

mix.less('resources/css/main.less', 'public/css')
    .less('resources/css/admin.less', 'public/css')
    .js(['resources/js/dashboard.js', 'resources/js/admin-reporting.js'], 'public/js/app.js')
    .sourceMaps()
    .browserSync('whistleblower-app.test');
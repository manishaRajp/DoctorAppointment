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

mix.styles([
    'public/admin/assets/plugins/morris/morris.css',
    'public/admin/assets/css/bootstrap.min.css',
    'public/admin/assets/css/icons.css',
    'public/admin/assets/css/style.css',
], 'public/admin/assets/css/all.css');


// mix.scripts([
//     'public/admin/assets/js/jquery.min.js',
//     'public/admin/assets/js/bootstrap.bundle.min.js',
//     'public/admin/assets/js/modernizr.min.js',
//     'public/admin/assets/js/detect.js',
//     'public/admin/assets/js/fastclick.js',
//     'public/admin/assets/js/jquery.slimscroll.js',
//     'public/admin/assets/js/jquery.blockUI.js',
//     'public/admin/assets/js/waves.js',
//     'public/admin/assets/js/jquery.nicescroll.js',
//     'public/admin/assets/js/jquery.scrollTo.min.js',
//     'public/admin/assets/plugins/skycons/skycons.min.js',
//     'public/admin/assets/plugins/peity/jquery.peity.min.js',
//     'public/admin/assets/plugins/morris/morris.min.js',
//     'public/admin/assets/plugins/raphael/raphael-min.js',
//     'public/admin/assets/pages/dashboard.js',
//     'public/admin/assets/js/app.js',
// ], 'public/admin/assets/js/all.js');




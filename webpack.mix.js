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


mix.sass('resources/assets/admin/main.scss', 'public/assets/admin/css')
    .options({
        processCssUrls: false
    })
    .copyDirectory('resources/assets/plugins/font-awesome/fonts', 'public/assets/admin/fonts')
    .copyDirectory('resources/assets/fonts', 'public/assets/admin/fonts')
    .copy('resources/assets/plugins/iCheck/flat/blue.png', 'public/assets/admin/css/blue.png')
    .copy('resources/assets/plugins/iCheck/flat/blue@2x.png', 'public/assets/admin/css/blue@2x.png')
    .copy('resources/assets/admin/css/custom-style.css', 'public/assets/admin/css/custom-style.css')
    .copy('resources/assets/admin/css/bootstrap-rtl.min.css', 'public/assets/admin/css/bootstrap-rtl.mincss');

mix.scripts([
    // 'resources/assets/plugins/morris/morris.min.js',
    // 'resources/assets/plugins/knob/jquery.knob.js',
    // 'resources/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
    // 'resources/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
    // 'resources/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
    // 'resources/assets/plugins/daterangepicker/daterangepicker.js',
    // 'resources/assets/plugins/datepicker/bootstrap-datepicker.js',
    // 'resources/assets/plugins/slimScroll/jquery.slimscroll.min.js',
    // 'resources/assets/plugins/fastclick/fastclick.js',
    'resources/assets/admin/js/adminlte.min.js',
    'resources/assets/admin/js/pages/dashboard.js',
    'resources/assets/admin/js/demo.js',
], 'public/assets/admin/app.js');
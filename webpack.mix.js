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

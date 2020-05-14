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

const plugin   = 'resources/js/plugins/';
const src_path = 'resources/js/';

mix.webpackConfig({
    resolve: {
        alias: {
            '@src': path.resolve(__dirname, src_path),
            '@components': path.resolve(__dirname, src_path + 'components'),
            '@common': path.resolve(__dirname, src_path + 'common'),
            '@public': path.resolve(__dirname, '/public'),
        }
    }
});

mix.js('resources/js/app.js', 'public/js')
    .extract([
        'vue',
        'axios',
        'datatables.net',
        'datatables.net-dt',
    ])
    .combine([
        //plugin + 'jquery/jquery-3.5.1.min.js',
        //plugin + 'datatables-net/js/jquery.dataTables.min.js',
        //plugin + 'datatables-net/js/dataTables.bootstrap4.min.js',
        //plugin + 'datatables-net/extensions/dataTables.select.min.js',
    ], 'public/js/theme.js')

    .sass('resources/sass/app.scss', 'public/css')
    .combine([
        //plugin + 'datatables-net/css/jquery.dataTables.min.css',
        //plugin + 'bootstrap/css/bootstrap.min.css',
        //plugin + 'datatables-net/css/dataTables.bootstrap4.min.css',
        //plugin + 'datatables-net/extensions/select.dataTables.min.css',
    ], 'public/css/theme.css');

if (mix.inProduction()) {
    mix.version();
}

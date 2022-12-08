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

mix.js('resources/js/role-permissions.js', 'public/jsApi/permissionsRoles')
    .js('resources/js/intervenant/couverture-beneficiaire.js', 'public/jsApi/intervenant')
    .js('resources/js/intervenant/drogueType-beneficiaire.js', 'public/jsApi/intervenant')
    .js('resources/js/intervenant/service-beneficiaire.js', 'public/jsApi/intervenant')
    .js('resources/js/intervenant/violenceType-beneficiaire.js', 'public/jsApi/intervenant')

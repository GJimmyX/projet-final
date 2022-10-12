const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Contrôle du Mix des imports JS et CSS
 |--------------------------------------------------------------------------
 |
 | Mix fournit un API simple et efficace pour définir certaines étapes de construction
 | du Webpack pour votre application Laravel. Par défaut, les fichiers .sass sont compilés
 | pour la construction de votre application Laravel, de même que vos fichiers JS.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/style.scss', 'public/css')
    .sourceMaps();

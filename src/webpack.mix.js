const mix = require('laravel-mix');

mix.js('resources/js/adm/app.js', 'public/adm/js')
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

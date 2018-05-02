let mix = require('laravel-mix');

// module.exports = {
//   mode: 'production'
// }

mix.js(
    ['resources/assets/js/app.js',
    ], 'public/js')
   .styles(
        [
            'resources/assets/css/app.css',
        ], 'public/css/style.css');

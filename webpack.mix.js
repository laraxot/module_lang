const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));

const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();

mix.js(__dirname + '/Resources/assets/js/app.js', 'js/lang.js')
<<<<<<< HEAD
    .sass(__dirname + '/Resources/assets/sass/app.scss', 'css/lang.css');
=======
    .sass( __dirname + '/Resources/assets/sass/app.scss', 'css/lang.css');
>>>>>>> 13065fd (.)

if (mix.inProduction()) {
    mix.version();
}

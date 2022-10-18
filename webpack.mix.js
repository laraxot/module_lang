<<<<<<< HEAD
<<<<<<< HEAD
const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));

const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();

mix.js(__dirname + '/Resources/assets/js/app.js', 'js/lang.js')
    .sass(__dirname + '/Resources/assets/sass/app.scss', 'css/lang.css');

if (mix.inProduction()) {
    mix.version();
}
=======
=======
>>>>>>> eec8c0a (.)
const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));

const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();

mix.js(__dirname + '/Resources/assets/js/app.js', 'js/lang.js')
    .sass(__dirname + '/Resources/assets/sass/app.scss', 'css/lang.css');

if (mix.inProduction()) {
    mix.version();
}
<<<<<<< HEAD
>>>>>>> b2f15d7 (.)
=======
>>>>>>> eec8c0a (.)

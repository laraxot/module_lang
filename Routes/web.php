<<<<<<< HEAD
<?php

<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);

=======
>>>>>>> 13065fd (.)
=======
>>>>>>> 1242904 (.)
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
<<<<<<< HEAD
<<<<<<< HEAD
=======

<<<<<<< HEAD
Route::prefix('lang')->group(function() {
    Route::get('/', 'LangController@index');
});
>>>>>>> 13065fd (.)
=======
=======

>>>>>>> 1242904 (.)
Route::prefix('lang')->group(
    function () {
        Route::get('/', 'LangController@index');
    }
);
<<<<<<< HEAD
>>>>>>> f7ae34c (.)
=======
>>>>>>> 1242904 (.)
=======
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('lang')->group(
    function () {
        Route::get('/', 'LangController@index');
    }
);
>>>>>>> cfb7936 (.)

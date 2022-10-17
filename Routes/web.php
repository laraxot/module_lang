<<<<<<< HEAD
<?php declare(strict_types=1);
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

<<<<<<< HEAD
Route::prefix('lang')->group(function() {
    Route::get('/', 'LangController@index');
});
>>>>>>> 13065fd (.)
=======
Route::prefix('lang')->group(
    function () {
        Route::get('/', 'LangController@index');
    }
);
>>>>>>> f7ae34c (.)

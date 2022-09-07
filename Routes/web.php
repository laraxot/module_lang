<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

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
>>>>>>> bf66904 (up)

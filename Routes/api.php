<<<<<<< HEAD
<?php declare(strict_types=1);
=======
<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/lang', function (Request $request) {
    return $request->user();
});
>>>>>>> 13065fd (.)

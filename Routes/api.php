<<<<<<< HEAD
<<<<<<< HEAD
<?php

<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);

=======
>>>>>>> 13065fd (.)
=======
>>>>>>> 1242904 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
/*
Route::middleware('auth:api')->get(
    '/lang', function (Request $request) {
        return $request->user();
    }
);
*/
=======

<<<<<<< HEAD
Route::middleware('auth:api')->get('/lang', function (Request $request) {
    return $request->user();
});
>>>>>>> 13065fd (.)
=======
=======

>>>>>>> 1242904 (.)
Route::middleware('auth:api')->get(
    '/lang', function (Request $request) {
        return $request->user();
    }
);
<<<<<<< HEAD
>>>>>>> f7ae34c (.)
=======
>>>>>>> 1242904 (.)
=======
=======
>>>>>>> b2f15d7 (.)
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

Route::middleware('auth:api')->get(
    '/lang', function (Request $request) {
        return $request->user();
    }
);
<<<<<<< HEAD
>>>>>>> cfb7936 (.)
=======
>>>>>>> b2f15d7 (.)

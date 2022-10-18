<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<?php

<<<<<<< HEAD
declare(strict_types=1);

=======
>>>>>>> 1242904 (.)
=======
<?php

declare(strict_types=1);

>>>>>>> 7c8dc60 (.)
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
=======

>>>>>>> f7ae34c (.)
=======

>>>>>>> 1242904 (.)
Route::middleware('auth:api')->get(
    '/lang', function (Request $request) {
        return $request->user();
    }
);
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
*/
=======
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
=======
>>>>>>> 7c8dc60 (.)

<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\LogoutController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\Auth\UserController;
use App\Http\Controllers\API\Params\ParamsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// auth route 
    Route::post('auth/login', LoginController::class);
    Route::post('auth/register', RegisterController::class);
// end auth route

// param route 
    Route::get('param/eselon1', [ParamsController::class, 'get_eselon1']);
    Route::get('param/eselon2', [ParamsController::class, 'get_eselon2']);
// end param route 
Route::middleware('auth:api')->group(function() {
    // auth route 
        Route::get('auth/user', UserController::class);
        Route::delete('auth/logout', LogoutController::class);
    // end auth route
});

<?php

use App\Http\Controllers\API\Assignment\CreateAssignmentController;
use App\Http\Controllers\API\Assignment\DeleteAssignmentController;
use App\Http\Controllers\API\Assignment\GetAssignmentController;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\LogoutController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\Auth\UserController;
use App\Http\Controllers\API\File\FileController;
use App\Http\Controllers\API\LegalProduct\CreateLegalProductController;
use App\Http\Controllers\API\LegalProduct\DeleteLegalProductController;
use App\Http\Controllers\API\LegalProduct\GetLegalProductController;
use App\Http\Controllers\API\LegalProduct\UpdateLegalProductController;
use App\Http\Controllers\API\Params\ParamsController;
use App\Http\Controllers\API\Review\CreateReviewController;
use App\Http\Controllers\API\Review\DeleteReviewController;
use App\Http\Controllers\API\Review\GetReviewController;
use App\Http\Controllers\API\Review\UpdateReviewController;
use App\Http\Controllers\API\ServiceCategory\ServiceCategoryController;
use App\Http\Controllers\API\User\GetUserController;
use App\Http\Controllers\API\User\UpdateUserController;
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

    // user route 
        Route::get('user', [GetUserController::class, 'get']);
        Route::put('user/update', [UpdateUserController::class, 'update']);
        Route::patch('user/change_password', [UpdateUserController::class, 'change_password']);
    // end user route

    // param route 
        Route::get('param/mandate', [ParamsController::class, 'get_mandate']);
    // end param route 

    // service category
        Route::get('service_category', [ServiceCategoryController::class, 'get']);
        Route::get('service_category/{service_category:id}', [ServiceCategoryController::class, 'show']);
    // end service category

    // legal product
        Route::get('legal_product', [GetLegalProductController::class, 'get']);
        Route::get('legal_product/{legal_product:id}', [GetLegalProductController::class, 'show']);
        Route::post('legal_product', CreateLegalProductController::class);
        Route::patch('legal_product/{legal_product:id}', UpdateLegalProductController::class);
        Route::delete('legal_product/{legal_product:id}', DeleteLegalProductController::class);
    // end legal product    

    // file
        Route::post('file', [FileController::class, 'create']);
        Route::delete('file/{file:id}', [FileController::class, 'delete']);
    // end file

    // assignment
        Route::post('assignment', CreateAssignmentController::class);
        Route::get('assignment', [GetAssignmentController::class, 'get']);
        Route::get('assignment/{assignment:id}', [GetAssignmentController::class, 'show']);
        Route::delete('assignment/{assignment:id}', DeleteAssignmentController::class);
    // end assigment

    // review
        Route::get('review', [GetReviewController::class, 'get']);
        Route::get('review/{review:id}', [GetReviewController::class, 'show']);
        Route::post('review', [CreateReviewController::class, 'create']);
        Route::patch('review/{review:id}', [UpdateReviewController::class, 'update']);
        Route::delete('review/{review:id}', [DeleteReviewController::class, 'delete']);
        Route::patch('review/{review:id}/progress/', [UpdateReviewController::class, 'progress']);
    // end review
});

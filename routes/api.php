<?php

use App\Http\Controllers\API\Assignment\CreateAssignmentController;
use App\Http\Controllers\API\Assignment\DeleteAssignmentController;
use App\Http\Controllers\API\Assignment\GetAssignmentController;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\LogoutController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\Auth\UserController;
use App\Http\Controllers\API\Comment\CreateCommentController;
use App\Http\Controllers\API\Comment\DeleteCommentController;
use App\Http\Controllers\API\Comment\GetCommentController;
use App\Http\Controllers\API\Determination\CreateDeterminationController;
use App\Http\Controllers\API\Determination\DeleteDeterminationController;
use App\Http\Controllers\API\Determination\GetDeterminationController;
use App\Http\Controllers\API\Determination\UpdateDeterminationController;
use App\Http\Controllers\API\File\FileController;
use App\Http\Controllers\API\Finalization\CreateFinalizationController;
use App\Http\Controllers\API\Finalization\DeleteFinalizationController;
use App\Http\Controllers\API\Finalization\GetFinalizationController;
use App\Http\Controllers\API\Finalization\UpdateFinalizationController;
use App\Http\Controllers\API\History\GetHistoryController;
use App\Http\Controllers\API\LegalProduct\CreateLegalProductController;
use App\Http\Controllers\API\LegalProduct\DeleteLegalProductController;
use App\Http\Controllers\API\LegalProduct\GetLegalProductController;
use App\Http\Controllers\API\LegalProduct\UpdateLegalProductController;
use App\Http\Controllers\API\Params\ParamsController;
use App\Http\Controllers\API\Report\StatisticsController;
use App\Http\Controllers\API\Report\TimelineController;
use App\Http\Controllers\API\Review\CreateReviewController;
use App\Http\Controllers\API\Review\DeleteReviewController;
use App\Http\Controllers\API\Review\GetReviewController;
use App\Http\Controllers\API\Review\UpdateReviewController;
use App\Http\Controllers\API\Review\Version\CreateReviewVersionController;
use App\Http\Controllers\API\Review\Version\DeleteReviewVersionController;
use App\Http\Controllers\API\Review\Version\GetReviewVersionController;
use App\Http\Controllers\API\Review\Version\UpdateReviewVersionController;
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
        Route::patch('legal_product/{legal_product:id}', [UpdateLegalProductController::class, 'update']);
        Route::patch('legal_product/{legal_product:id}/status', [UpdateLegalProductController::class, 'status']);
        Route::delete('legal_product/{legal_product:id}', DeleteLegalProductController::class);
        Route::patch('legal_product/{legal_product:id}/finalization_progress', [UpdateLegalProductController::class, 'finalization_progress']);
        Route::get('legal_product/{legal_product:id}/stage_status', [GetLegalProductController::class, 'stage_status']);
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

    // review version
        Route::post('review_version', CreateReviewVersionController::class);
        Route::get('review_version', [GetReviewVersionController::class, 'get']);
        Route::get('review_version/{review_version:id}', [GetReviewVersionController::class, 'show']);
        Route::delete('review_version/{review_version:id}', DeleteReviewVersionController::class);
        Route::put('review_version/{review_version:id}', [UpdateReviewVersionController::class, 'update']);
    // end review version

    // finalization
        Route::post('finalization', CreateFinalizationController::class);
        Route::get('finalization', [GetFinalizationController::class, 'get']);
        Route::get('finalization/{finalization:id}', [GetFinalizationController::class, 'show']);
        Route::put('finalization/{finalization:id}', [UpdateFinalizationController::class, 'update']);
        Route::delete('finalization/{finalization:id}', DeleteFinalizationController::class);
    // end finalization

    // determination
        Route::post('determination', CreateDeterminationController::class);
        Route::get('determination', [GetDeterminationController::class, 'get']);
        Route::get('determination/{determination:id}', [GetDeterminationController::class, 'show']);
        Route::put('determination/{determination:id}', [UpdateDeterminationController::class, 'update']);
        Route::delete('determination/{determination:id}', DeleteDeterminationController::class);
    // end determination

    // comment
        Route::post('comment', CreateCommentController::class);
        Route::get('comment', [GetCommentController::class, 'get']);
        Route::delete('comment/{comment:id}', DeleteCommentController::class);
    // end comment

    // history
        Route::get('history', [GetHistoryController::class, 'get']);
        Route::get('history/{history:id}', [GetHistoryController::class, 'show']);
    // end history

    // report
        Route::get('report/timeline', [TimelineController::class, 'timeline']);
        Route::get('report/legal_product_by_month', [StatisticsController::class, 'legal_product_by_month']);
        Route::get('report/legal_product_by_service_category', [StatisticsController::class, 'legal_pruduct_by_service_category']);
    // end report
});

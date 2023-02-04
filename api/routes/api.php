<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ListingController;

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

// User area
Route::middleware(['auth:api'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    // listings
    Route::group(['prefix' => 'my_listings'], function() {
        Route::get('/', [UserController::class, 'loggedInUserListings']);
        Route::post('/', [ListingController::class, 'store']);
        Route::get('/{listing}', [ListingController::class, 'loggedInUserSelectedListing']);
        Route::put('/{listing}', [ListingController::class, 'update']);
        Route::delete('/{listing}', [ListingController::class, 'destroy']);
    });
});

// Public
Route::post('login', [AuthController::class, 'login']);
Route::get('/', [ListingController::class, 'show_public']);
Route::get('/{listing}', [ListingController::class, 'show_selected_public']);
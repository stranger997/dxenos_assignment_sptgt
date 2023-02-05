<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
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

// User area
Route::middleware(['auth:api'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    // listings
    Route::group(['prefix' => 'listings'], function() {
        Route::get('/', [ListingController::class, 'getListings']);
        Route::post('/', [ListingController::class, 'store']);

        Route::delete('/{listing}', [ListingController::class, 'destroy']);
    });
});

// Public
Route::post('login', [AuthController::class, 'login']);
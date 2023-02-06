<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WebappController;

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

Route::get('/', [WebappController::class, 'login']);
Route::post('/', [WebappController::class, 'userLogin'])->name('user.login');

// Route::group( ['middleware' => 'auth' ], function()
// {
Route::post('logout', [WebappController::class, 'logout']);
Route::get('dashboard', [WebappController::class, 'dashboard'])->name('dashboard');
// });

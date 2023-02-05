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
//Guest
Route::get('/', [WebappController::class, 'login'])->name('login');
Route::post('/', [WebappController::class, 'login']);

//User area
Route::get('logout', [WebappController::class, 'logout'])->name('logout');
Route::get('dashboard', [WebappController::class, 'dashboard'])->name('dashboard');

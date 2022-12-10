<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;
use App\Http\Controllers\videoController;

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

Route::get('/', [videoController::class, 'index']);

Route::get('upload', [videoController::class, 'create']);

Route::post('uploadVideo', [videoController::class, 'store']);

Route::get('show/{id}', [videoController::class, 'show']);

Route::put('updateThumbnail/{id}', [videoController::class, 'updateThumbnail']);

Route::put('updateVideo/{id}', [videoController::class, 'updateVideo']);

Route::get('editThumbnail/{id}', [videoController::class, 'editThumbnail']);

Route::get('editVideo/{id}', [videoController::class, 'editVideo']);
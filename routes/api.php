<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/movies/watched', [MoviesController::class, 'getWatchedList'])->name('getWatchedList');

Route::get('/movies/wishlist', [MoviesController::class, 'getWishList'])->name('getWishList');

Route::get('/movies/', [MoviesController::class, 'index'])->name('movies');

Route::get('/movies/{id}', [MoviesController::class, 'show'])->name('movies.show');

Route::post('/movies/', [MoviesController::class, 'store'])->name('movies.store');

Route::put('/movies/', [MoviesController::class, 'update'])->name('movies.update');

Route::delete('/movies/', [MoviesController::class, 'destroy'])->name('movies.delete');

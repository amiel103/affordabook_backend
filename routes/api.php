<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteBookController;
use App\Http\Controllers\PostController;
/*

|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/hello', [AuthController::class, 'hello']);
Route::post('/favorite-books', [FavoriteBookController::class, 'store']);
Route::get('/favorite-books/{userId}', [FavoriteBookController::class, 'index']);



Route::post('/posts', [PostController::class, 'store']);
Route::get('/get-posts', [PostController::class, 'index']);

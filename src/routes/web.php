<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [AuthController::class,'login'])->name('login');
Route::get('/register', [AuthController::class, 'register']);
Route::get('/thanks', [AuthController::class, 'thanks']);

Route::middleware('auth')->group(function () {
    Route::get('/', [ShopController::class, 'index']);
    Route::get('/detail/{id}', [ShopController::class, 'detail']);
    Route::get('/search', [ShopController::class, 'search']);
    Route::get('/mypage', [ShopController::class, 'mypage']);
    Route::post('/reservation', [ReservationController::class, 'create']);
    Route::delete('/reservation/delete', [ReservationController::class, 'delete']);
    Route::get('/reservation/change/{id}', [ReservationController::class, 'change']);
    Route::patch('/reservation/update', [ReservationController::class, 'update']);
    Route::get('/evaluation/{id}', [ReservationController::class, 'evaluation']);
    Route::post('/evaluation', [ReservationController::class, 'comment']);
    Route::post('/store/{id}', [LikeController::class, 'store']);
    Route::delete('/destroy/{id}', [LikeController::class, 'destroy']);
});
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ServiceController;
use Laravel\Sanctum\Sanctum;

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

Route::get('/services',[ServiceController::class, 'list']);
Route::get('/services/{id}',[ServiceController::class, 'show']);
Route::post('/services', [ServiceController::class, 'store']);
Route::put('/services/{id}', [ServiceController::class, 'update']);


Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function(){ 
    Route::get('/user', [\App\Http\Controllers\Api\AuthController::class, 'user']);
    Route::get('/hellouser', [\App\Http\Controllers\Api\AuthController::class, 'helloUser']);
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
    Route::post('/orders', [\App\Http\Controllers\Api\OrdersController::class, 'store']);
});

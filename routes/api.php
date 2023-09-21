<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\CountryController;

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

Route::get('/hotels',[HotelController::class, 'list']);
Route::get('/hotels/{id}',[HotelController::class, 'show']);
Route::post('/hotels', [HotelController::class, 'store']);
Route::put('/hotels/{id}', [HotelController::class, 'update']);

Route::get('/cities',[CityController::class, 'list']);
Route::get('/cities/{id}',[CityController::class, 'show']);
Route::post('/cities', [CityController::class, 'store']);
Route::put('/cities/{id}', [CityController::class, 'update']);

Route::get('/countries',[CountryController::class, 'list']);
Route::get('/countries/{id}',[CountryController::class, 'show']);
Route::post('/countries', [CountryController::class, 'store']);
Route::put('/countries/{id}', [CountryController::class, 'update']);
Route::get('/country/hotels',[CountryController::class, 'getActualHotels']);

Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function(){ 
    Route::get('/user', [\App\Http\Controllers\Api\AuthController::class, 'user']);
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
    Route::post('/orders', [\App\Http\Controllers\Api\OrdersController::class, 'store']);
});

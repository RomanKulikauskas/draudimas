<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/cars', [\App\Http\Controllers\CarsOwnersControllerAPI::class, 'cars']);
Route::get('/cars/{id}', [\App\Http\Controllers\CarsOwnersControllerAPI::class, 'car']);

Route::post('/cars', [\App\Http\Controllers\CarsOwnersControllerAPI::class, 'store']);

Route::put('/cars/{id}', [\App\Http\Controllers\CarsOwnersControllerAPI::class, 'update']);

Route::delete('/cars/{id}', [\App\Http\Controllers\CarsOwnersControllerAPI::class, 'destroy']);




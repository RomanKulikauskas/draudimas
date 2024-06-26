<?php

use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::resource('cars', \App\Http\Controllers\CarController::class)->only([
    'index'
]);
Route::middleware(['auth'])->group(function () {
    Route::resource('cars', \App\Http\Controllers\CarController::class)->except(['index']);


    Route::get('/owner/create', [OwnerController::class, 'create'])->name('owner.create');
    Route::post('/owner/store', [OwnerController::class, 'store'])->name('owner.store');

    Route::get('/owners', [OwnerController::class, 'index'])->name('owner.index');

    Route::get('/owner/{id}/edit', [OwnerController::class, 'edit'])->name('owner.edit');
    Route::post('/owner/{id}/save', [OwnerController::class, 'save'])->name('owner.save');

    Route::get('/owner/{id}/delete', [OwnerController::class, 'delete'])->name('owner.delete');
    Route::get('/car/{id}/document',[\App\Http\Controllers\CarController::class, 'document'])->name('car.document');
    Route::get('/car/{id}/documentDelete',[\App\Http\Controllers\CarController::class, 'documentDelete'])->name('car.documentDelete');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('setlanguage/{lang}', [\App\Http\Controllers\LanguageController::class,'setLanguage'])->name('setLanguage');

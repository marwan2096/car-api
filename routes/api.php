<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

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


Route::prefix('cars')->group(function () {
    Route::get('/', [CarController::class, 'index'])->name('cars.index');
    Route::post('/', [CarController::class, 'store'])->name('cars.store');
    Route::get('/{id}', [CarController::class, 'show'])->name('cars.show');
    Route::put('/{id}', [CarController::class, 'update'])->name('cars.update');
    Route::delete('/{id}', [CarController::class, 'destroy'])->name('cars.destroy');
    Route::get('/{id}', [CarController::class, 'destroy'])->name('cars.destroy');
    Route::get('/search/{name}', [CarController::class, 'search'])->name('cars.search');

});

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PocketController;

Route::get('/', [PocketController::class, 'index'])->name('home');
Route::post('/store-income', [PocketController::class, 'storeIncome'])->name('store.income');
Route::post('/store-outcome', [PocketController::class, 'storeOutcome'])->name('store.outcome');
Route::prefix('/get')->group(function () {
    Route::get('/form-income', [PocketController::class, 'getFormIncome']);
    Route::get('/table-outcome', [PocketController::class, 'tableOutcome']);
    Route::get('/table-income', [PocketController::class, 'tableIncome']);
    Route::get('/total-outcome', [PocketController::class, 'getTotalOutcome']);
    Route::get('/total-income', [PocketController::class, 'getTotalIncome']);
});
Route::prefix('/delete')->group(function(){
    Route::delete('/income/{id}', [PocketController::class, 'destroyIncome']);
    Route::delete('/outcome/{id}', [PocketController::class, 'destroyOutcome']);
});

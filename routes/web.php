<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PocketController;

Route::middleware(['web'])->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
        Route::get('/create-account', function () {
            return view('auth.regist');
        })->name('register');
        Route::post('/login', [AuthController::class, 'login'])->name('authentication');
        Route::post('/signup', [AuthController::class, 'signup'])->name('resgist');

        Route::get('/forgot-password', function () {
            return view('auth.forgot-password');
        })->name('forgot.password');

        Route::get('/verify/otp', function () {
            return view('auth.verify-otp');
        })->name('otp');

        Route::post('/forgot-password', [ForgotPasswordController::class, 'sendOtp'])->name('send.otp');
        Route::post('/verify-otp', [ForgotPasswordController::class, 'verifyOtp'])->name('verify.otp');
        Route::get('/reset-password/{email}', [ForgotPasswordController::class, 'showResetForm'])->name('reset.password.form');
        Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('reset.password');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/pocket', [PocketController::class, 'index'])->name('home');
        Route::post('/store-income', [PocketController::class, 'storeIncome'])->name('store.income');
        Route::post('/store-outcome', [PocketController::class, 'storeOutcome'])->name('store.outcome');

        Route::prefix('/get')->group(function () {
            Route::get('/form-income', [PocketController::class, 'getFormIncome']);
            Route::get('/table-outcome', [PocketController::class, 'tableOutcome']);
            Route::get('/table-income', [PocketController::class, 'tableIncome']);
            Route::get('/total-outcome', [PocketController::class, 'getTotalOutcome']);
            Route::get('/total-income', [PocketController::class, 'getTotalIncome']);
        });
        Route::prefix('/delete')->group(function () {
            Route::delete('/income/{id}', [PocketController::class, 'destroyIncome']);
            Route::delete('/outcome/{id}', [PocketController::class, 'destroyOutcome']);
        });
    });
});
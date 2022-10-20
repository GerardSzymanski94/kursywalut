<?php

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

Route::get('/', [\App\Http\Controllers\CurrencyController::class, 'index']);

Route::name('currency.')->prefix('currency')->group(function () {
    Route::get('/update_exchange_rate', [\App\Http\Controllers\CurrencyController::class, 'updateExchangeRates'])->name('updateExchangeRates');
});

Route::name('api.')->prefix('api')->group(function () {
    Route::get('/get_exchange_rate_data', [\App\Http\Controllers\Api\CurrencyController::class, 'getExchangeRateData']);
});


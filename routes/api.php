<?php

use App\Repositories\CurrencyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('currency.')->prefix('currency')->group(function () {
    Route::get('/all', function () {
        return new \App\Http\Resources\CurrencyCollection(\App\Models\Currency::all());
    });
    Route::get('/update', function () {
        $currencyRepo = new CurrencyRepository();
        return $currencyRepo->updateExchangeRates();
    });

});

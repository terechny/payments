<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ApplicationController;

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

Route::post('/application', [ ApplicationController::class, 'store' ] )->name('application.store');

Route::get('/users/{user}/payments', [ UserController::class, 'payments' ] )->where(['user' => '[0-9]+']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function(){

    Route::resource('users', UserController::class);
    Route::resource('payments', PaymentController::class);
});




<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Api\PhoneBook\Controllers\PhoneBookController;
use App\Api\Auth\Controllers\AuthController;

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

Route::prefix('auth')->group(function (){
    Route::post('login', AuthController::class . '@login');
    Route::post('register', AuthController::class . '@register');
    Route::get('me', AuthController::class . '@getAuthUser');
    Route::post('logout', AuthController::class . '@logout');
});

Route::prefix('phonebooks')->group(function (){
    Route::get('', PhoneBookController::class . '@all');
    Route::post('', PhoneBookController::class . '@create');
    Route::get('{id}', PhoneBookController::class . '@get');
    Route::put('{id}', PhoneBookController::class . '@update');
    Route::delete('{id}', PhoneBookController::class . '@delete');
});

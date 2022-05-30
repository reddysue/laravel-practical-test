<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserFormInputController;

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
Route::group(['prefix' => 'v1.0'], function () {
    Route::controller(AuthController::class)->group(function(){
        Route::post('register', 'register');
        Route::post('login', 'login');
    });
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('add-input-type', [UserFormInputController::class, 'add']);
        Route::get('input-types', [UserFormInputController::class, 'list']);
    });
});

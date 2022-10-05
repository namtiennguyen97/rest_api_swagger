<?php

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group(['prefix'=> 'users'], function (){
    Route::get('/',[\App\Http\Controllers\UserController::class,'index'])->name('user.index');
    Route::post('/create',[\App\Http\Controllers\UserController::class,'createUser']);
    Route::get('/show/{id}',[\App\Http\Controllers\UserController::class,'showById']);
    Route::post('/update/{id}',[\App\Http\Controllers\UserController::class,'updateUser']);
    Route::delete('/delete/{id}',[\App\Http\Controllers\UserController::class,'deleteUser']);
});


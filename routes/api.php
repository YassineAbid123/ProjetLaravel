<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\MarquesController;
use App\Http\Controllers\AutomobileController;
use App\Http\Controllers\AuthController; 


Route::group([ 
 'middleware' => 'api', 
 'prefix' => 'auth'
], function ($router) { 
 Route::post('/login', [AuthController::class, 'login']); 
 Route::post('/register', [AuthController::class, 'register']); 
 Route::post('/logout', [AuthController::class, 'logout']); 
 Route::post('/refresh', [AuthController::class, 'refresh']); 
 Route::get('/user-profile', [AuthController::class, 'userProfile']); 
}); 
Route::middleware('api')->group(function () {
Route::resource('automobiles', AutomobileController::class);
});
Route::middleware('api')->group(function () {
Route::resource('marques', 
MarquesController::class); 
});
Route::get('/marq/{idcat}', 
[MarquesController::class,'showMarqueByCAT']);

Route::middleware('api')->group(function () {
    Route::resource('categories', CategorieController::class);
    });
    
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
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

// Public Routes
Route::get('products/search/{name}', [ProductController::class, 'search']);
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Private Routes
Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::resource('products', ProductController::class);
    Route::post('logout', [AuthController::class, 'logout']);
});


// Route::group(['middleware'=>['auth:sanctum']], function(){
//     Route::get('products/search/{name}', [ProductController::class, 'search']);
// });


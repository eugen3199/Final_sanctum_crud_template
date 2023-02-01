<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\PrefixController;
use App\Http\Controllers\DepartmentController;
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
// Route::get('products/search/{name}', [ProductController::class, 'search']);
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('employees/search/{{empCardID}}', [EmployeeController::class, 'search']);

// Private Routes
Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::post('logout', [AuthController::class, 'logout']);
    Route::resource('employees', EmployeeController::class);
    Route::resource('students', StudentController::class);
    Route::resource('campuses', CampusController::class);
    Route::resource('batches', BatchController::class);
    Route::resource('classes', ClassController::class);
    Route::resource('prefixes', PrefixController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('users', UserController::class);
});


// Route::group(['middleware'=>['auth:sanctum']], function(){
//     Route::get('products/search/{name}', [ProductController::class, 'search']);
// });


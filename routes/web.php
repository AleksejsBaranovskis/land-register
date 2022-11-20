<?php

use App\Http\Controllers\LandPropertyController;
use App\Http\Controllers\UserController;
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

/** User routes */

// Show users (Welcome page)
Route::get('/', [UserController::class, 'index']);

// Show user create form
Route::get('/users/create', [UserController::class, 'create']);

// Store new user
Route::post('/', [UserController::class, 'store']);

// Show edit form
Route::get('/users/{user}/edit', [UserController::class, 'edit']);

// Update user
Route::put('/users/{user}', [UserController::class, 'update']);

// Delete user
Route::delete('/{user}', [UserController::class, 'destroy']);


/** Property routes */

// Show properties
Route::get('/properties', [LandPropertyController::class, 'index']);

// Show property create form
Route::get('/properties/create', [LandPropertyController::class, 'create']);

// Store new property
Route::post('/properties', [LandPropertyController::class, 'store']);

// Show edit form
Route::get('/properties/{property}/edit', [LandPropertyController::class, 'edit']);

// Update user
Route::put('/properties/{property}', [LandPropertyController::class, 'update']);

// Delete land property
Route::delete('/properties/{property}', [LandPropertyController::class, 'destroy']);

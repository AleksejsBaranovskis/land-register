<?php

use App\Http\Controllers\LandPropertyController;
use App\Http\Controllers\LandUnitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/** User routes */

// Show all (Welcome page)
Route::get('/', [UserController::class, 'index']);

// Show create form
Route::get('/users/create', [UserController::class, 'create']);

// Store user
Route::post('/', [UserController::class, 'store']);

// Show edit form
Route::get('/users/{user}/edit', [UserController::class, 'edit']);

// Update
Route::put('/users/{user}', [UserController::class, 'update']);

// Delete
Route::delete('/{user}', [UserController::class, 'destroy']);

// Show users without properties
Route::get('/users/users-without-properties', [UserController::class, 'showUsersWithoutProperties']);


/** Land property routes */

// Show all
Route::get('/properties', [LandPropertyController::class, 'index']);

// Show create form
Route::get('/properties/create', [LandPropertyController::class, 'create']);

// Store
Route::post('/properties', [LandPropertyController::class, 'store']);

// Show edit form
Route::get('/properties/{property}/edit', [LandPropertyController::class, 'edit']);

// Update
Route::put('/properties/{property}', [LandPropertyController::class, 'update']);

// Delete
Route::delete('/properties/{property}', [LandPropertyController::class, 'destroy']);

// Show user's properties
Route::get('/{user}/properties', [LandPropertyController::class, 'showUserProperties']);

// Show land properties without land units
Route::get('/properties/properties-without-units', [LandPropertyController::class, 'showPropertiesWithoutUnits']);

// Show user land properties without land units
Route::get('/{user}/user-properties-without-units', [LandPropertyController::class, 'showUserPropertiesWithoutUnits']);


/** Land unit routes */

// Show land property units
Route::get('/properties/{property}/units', [LandUnitController::class, 'index']);

// Show create form
Route::get('/properties/{property}/units/create', [LandUnitController::class, 'create']);

// Store
Route::post('/properties/{property}/units', [LandUnitController::class, 'store']);

// Show edit form
Route::get('/properties/{property}/units/{unit}/edit', [LandUnitController::class, 'edit']);

// Update
Route::put('/properties/{property}/units', [LandUnitController::class, 'update']);

// Delete
Route::delete('/properties/{property}/units/{unit}', [LandUnitController::class, 'destroy']);

// Show land units without usage
Route::get('/properties/{property}/units-without-usage', [LandUnitController::class, 'showLandUnitsWithoutUsage']);


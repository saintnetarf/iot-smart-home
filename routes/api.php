<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//lamps
Route::get('/lamps', [App\Http\Controllers\Api\LampController::class, 'index']);

//update lamp
Route::post('/lamps/{id}', [App\Http\Controllers\Api\LampController::class, 'updateLamp']);

//status lamps
Route::get('/status', [App\Http\Controllers\Api\StatusController::class, 'index']);

//histories
Route::get('/histories', [App\Http\Controllers\Api\HistoryController::class, 'index']);

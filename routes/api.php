<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatabaseController;

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

Route::get('/my-films', [DatabaseController::class, 'index']);
Route::get('my-films/{id}', [DatabaseController::class, 'show']);

Route::get('/database', [DatabaseController::class, 'index']);
Route::post('database/store', [DatabaseController::class, 'store']);
Route::put('database/{id}', [DatabaseController::class, 'update']);
Route::get('database/delete/{id}', [DatabaseController::class, 'destroy']);

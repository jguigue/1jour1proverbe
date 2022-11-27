<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProverbeController;
use App\Http\Controllers\RandomProverbes;
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
Route::get('/proverbes', [App\Http\Controllers\ProverbeController::class, 'index']);
Route::post('/save', [App\Http\Controllers\ProverbeController::class, 'store']);
Route::put('/update/{id}', [App\Http\Controllers\ProverbeController::class, 'update']);
Route::delete('/delete/{id}',[App\Http\Controllers\ProverbeController::class, 'destroy']);
Route::get('/randomproverbes', [App\Http\Controllers\RandomProverbes::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
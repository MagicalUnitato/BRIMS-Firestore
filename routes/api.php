<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadCSVController;
use App\Http\Controllers\ViewDataController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/upload-content',[UploadCSVController::class,'uploadContent'])->name('import.content');
Route::get('/averageSpeeds',[ViewDataController::class,'getAverageSpeeds']);
Route::get('/customDateSpeed/{serviceProvider},{startDate},{endDate}',[ViewDataController::class,'getMonthlySpeedProvider']);
Route::get('/calcAverage/{serviceProvider}',[ViewDataController::class,'calculateAverage']);
Route::get('/averageSpeeds',[ViewDataController::class,'getAverageSpeeds']);
Route::get('/heatMapData',[ViewDataController::class,'getHeatMapData']);
<?php

use App\Http\Controllers\Api\SliderController;
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



Route::middleware('auth.apikey')->group(function (){
    
    Route::post('data',[App\Http\Controllers\Api\SliderController::class,'data']);
    Route::post('country',[App\Http\Controllers\Api\SliderController::class,'country_store']);
    Route::post('slider_delete',[App\Http\Controllers\Api\SliderController::class,'delete']);
    //////////////////////////// Teamm ///////////////////
    Route::post('team_add',[App\Http\Controllers\Api\TeamController::class,'add']);
    Route::post('team_delete',[App\Http\Controllers\Api\TeamController::class,'delete']);

    Route::post('update',[App\Http\Controllers\Api\TeamController::class,'update']);
});

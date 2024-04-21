<?php

use App\Http\Controllers\Api\V1\AircraftAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\ApiTestController;
use App\Http\Controllers\Api\V1\AirlineAPIController;

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


// API V1
// Route Group for api/v1 PROTECTED routes

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1', 'middleware' => 'auth:sanctum' ], function() {
    Route::get('apitest', [ApiTestController::class, 'index'])->name('apitest');

    // Can receive GET or POST.
    Route::apiResource('airlines', AirlineAPIController::class);

    Route::get('/airline/{airline}/aircraft/', [AircraftAPIController::class, 'listAircraftForAirline'])->name('aircraftlistforairline');
    Route::post('/airline/{airline}/aircraft/', [AircraftAPIController::class, 'addAircraftForAirline'])->name('aircraftaddforairline');

});

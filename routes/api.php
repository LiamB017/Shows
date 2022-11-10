<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\NetworkController;
use App\Http\Controllers\ServiceController;

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

// // Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
// //     return $request->user();
// // });


// This line creates all the routes for the show controller
Route::apiResource('/shows', ShowController::class);

// This line creates all the routes for the network controller
Route::apiResource('/networks', NetworkController::class);

// This line specifies and creates which routes are used for the service controller
Route::resource('/services', ServiceController::class)->only(['index','show']);
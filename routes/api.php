<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\NetworkController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\AuthController;

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

// This line creates all the routes for the show controller
Route::apiResource('/shows', ShowController::class);

// This line creates all the routes for the network controller
Route::apiResource('/networks', NetworkController::class);


// This line creates all the routes for the actor controller
Route::apiResource('/actors', ActorController::class);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Auth Routes for register and login


Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);


// every route within these curly brackets require an authentication bearer token
Route::middleware('auth:sanctum')->group(function (){
    Route::post('/auth/logout',[AuthController::class, 'logout']);
    Route::get('/auth/user',[AuthController::class, 'user']);

    // You need to be logged in for all book functionality except get all and get by id
    Route::apiResource('/shows', ShowController::class)->except((['index', 'show']));
});

// Shows - Define the get all and get by ID routes outside the authentication group
Route::get('/shows', [ShowController::class, 'index']);
Route::get('/shows/{show}', [ShowController::class, 'show']);
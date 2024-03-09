<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('access_token', \App\Http\Controllers\API\GenerateAccessTokenController::class.'@execute');
Route::post('handle_calls', \App\Http\Controllers\API\HandleIncomingCallsController::class.'@execute');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

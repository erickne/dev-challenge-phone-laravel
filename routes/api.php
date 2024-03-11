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

Route::get('access_token', \App\Http\Controllers\API\GenerateAccessTokenController::class.'@execute');
Route::post('handle_calls', \App\Http\Controllers\API\HandleIncomingCallsController::class.'@execute');
Route::post('handle_response', \App\Http\Controllers\API\HandleResponseFromCallerController::class.'@execute');
Route::post('handle_recording', \App\Http\Controllers\API\HandleRecordingController::class.'@execute');
Route::get('call_reject', \App\Http\Controllers\API\IncomingCallRejectController::class.'@execute');
Route::get('call_accept', \App\Http\Controllers\API\IncomingCallAcceptController::class.'@execute');
Route::get('calls', \App\Http\Controllers\API\GetAllCallsController::class.'@execute');

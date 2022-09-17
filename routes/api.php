<?php

use App\Http\Controllers\API\Chat_controllerApi;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/Chat/create', [Chat_controllerApi::class, 'store']);

Route::post('/Chat/getAllWhereOrder', [Chat_controllerApi::class, 'getAllWhereOrder']);

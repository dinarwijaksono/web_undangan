<?php

use App\Http\Controllers\Category_controller;
use App\Http\Controllers\User_controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/* User_controller */
Route::post('/register', [User_controller::class, 'store'])->middleware('guest');
/* end User_controller */


/* Category_controller */
Route::post('/Category/create', [Category_controller::class, 'store'])->middleware('auth');
/* end Category_controller */
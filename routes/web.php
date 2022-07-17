<?php

use App\Http\Controllers\Auth_controller;
use App\Http\Controllers\Category_controller;
use App\Http\Controllers\Home_controller;
use App\Http\Controllers\Main_controller;
use App\Http\Controllers\Product_controller;
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

/* Home_controller */

Route::get('/', [Home_controller::class, 'index']);
/*end  Home_controller */


/* Auth_controller */
Route::get('/Login', [Auth_controller::class, 'login'])->name('login')->middleware('guest');

Route::post('/Login', [Auth_controller::class, 'loginProcess'])->middleware('guest');
/* end Auth_controller */


/* Main_controller */
Route::get('/Main', [Main_controller::class, 'index'])->middleware('auth');
/* end Main_controller */


/* User_controller */
Route::post('/register', [User_controller::class, 'store'])->middleware('guest');
/* end User_controller */


/* Category_controller */
Route::post('/Category/create', [Category_controller::class, 'store'])->middleware('auth');

Route::post('/Category/edit/{code}', [Category_controller::class, 'update'])->middleware('auth');

Route::delete('/Category/delete/{code}', [Category_controller::class, 'destroy'])->middleware('auth');
/* end Category_controller */


/* Product_controller */
Route::post('/Product/create', [Product_controller::class, 'store'])->middleware('auth');

Route::post('/Product/edit/{code}', [Product_controller::class, 'update'])->middleware('auth');

Route::delete('/Product/delete/{code}', [Product_controller::class, 'destroy'])->middleware('auth');
/* end Product_controller */
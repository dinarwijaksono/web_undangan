<?php

use App\Http\Controllers\Auth_controller;
use App\Http\Controllers\Category_controller;
use App\Http\Controllers\ConfigManagement_controller;
use App\Http\Controllers\Demo_controller;
use App\Http\Controllers\Home_controller;
use App\Http\Controllers\Main_controller;
use App\Http\Controllers\Order_controller;
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

Route::get('/', [Home_controller::class, 'showProduct']);

Route::get('/Home/listProduct', [Home_controller::class, 'showProduct']);

/*end  Home_controller */


/* Auth_controller */
Route::get('/Login', [Auth_controller::class, 'login'])->name('login')->middleware('guest');

Route::post('/Login', [Auth_controller::class, 'loginProcess'])->middleware('guest');

Route::post('/logout', [Auth_controller::class, 'logout'])->middleware('auth');
/* end Auth_controller */


/* Main_controller */
Route::get('/Main', [Main_controller::class, 'index'])->middleware('auth');
/* end Main_controller */

/* Category_controller */
Route::get('/Category', [Category_controller::class, 'index'])->middleware('auth');

Route::get('/Category/create', [Category_controller::class, 'create'])->middleware('auth');
Route::post('/Category/create', [Category_controller::class, 'store'])->middleware('auth');

Route::get('/Category/edit/{code}', [Category_controller::class, 'edit'])->middleware('auth');
Route::post('/Category/edit/{code}', [Category_controller::class, 'update'])->middleware('auth');

Route::delete('/Category/delete/{code}', [Category_controller::class, 'destroy'])->middleware('auth');
/* end Category_controller */


/* Product_controller */
Route::get('/Product', [Product_controller::class, 'index'])->middleware('auth');

Route::get('/Product/create', [Product_controller::class, 'create'])->middleware('auth');
Route::post('/Product/create', [Product_controller::class, 'store'])->middleware('auth');

Route::get('/Product/edit/{code}', [Product_controller::class, 'edit'])->middleware('auth');
Route::post('/Product/edit/{code}', [Product_controller::class, 'update'])->middleware('auth');

Route::delete('/Product/delete/{code}', [Product_controller::class, 'destroy'])->middleware('auth');
/* end Product_controller */


/* Config */
Route::get('/Config/userManagement', [User_controller::class, 'index'])->middleware('auth');

Route::get('/Config/addUser', [User_controller::class, 'create'])->middleware('auth');
Route::post('/Config/addUser', [User_controller::class, 'store'])->middleware('auth');

Route::delete('/Config/deleteUser/{id}', [User_controller::class, 'destroy'])->middleware('auth');
/* end Config */




/* Demo_controller */
Route::get('/Demo/{code}', [Demo_controller::class, 'product']);
/* end Demo_controller */


/* Order_controller */
Route::get('/Order', [Order_controller::class, 'index'])->middleware('auth');

Route::get('/Order/create', [Order_controller::class, 'create'])->middleware('auth');
Route::post('/Order/create', [Order_controller::class, 'store'])->middleware('auth');

Route::get('/Order/edit/{code}', [Order_controller::class, 'edit'])->middleware('auth');
Route::post('/Order/edit/{code}', [Order_controller::class, 'store'])->middleware('auth');

Route::delete('/Order/delete/{code}', [Order_controller::class, 'destroy'])->middleware('auth');
/* end Order_controller */
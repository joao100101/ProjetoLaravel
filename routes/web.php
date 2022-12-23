<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
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

Route::get('/categories', [CategoryController::class, 'index'])->middleware('auth');
Route::get('/category/create', [CategoryController::class, 'create'])->middleware('auth');
Route::post('/category', [CategoryController::class, 'store']);
Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->middleware('auth');
Route::put('/category/update/{id}', [CategoryController::class, 'update'])->middleware('auth');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->middleware('auth');


Route::get('/', [UserController::class, 'index'])->middleware('auth');
Route::get('/user/create', [UserController::class, 'create'])->middleware('auth');
Route::post('/user', [UserController::class, 'store']);
Route::get('user/edit/{id}', [UserController::class, 'edit'])->middleware('auth');
Route::put('/user/update/{id}', [UserController::class, 'update'])->middleware('auth');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->middleware('auth');
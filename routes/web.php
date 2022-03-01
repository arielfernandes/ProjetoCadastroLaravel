<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
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

Route::get('/', [RegisterController::class, 'index'])->name('index');
Route::get('/csv', [RegisterController::class, 'create_csv'])->middleware('auth');
Route::get('/registers/create', [RegisterController::class, 'create'])->middleware('auth');
Route::get('/registers/{id}', [RegisterController::class, 'show']);
Route::post('/registers', [RegisterController::class, 'store']);
Route::delete('/registers/{id}', [RegisterController::class, 'destroy'])->middleware('auth');
Route::get('/registers/edit/{id}', [RegisterController::class, 'edit'])->middleware('auth');
Route::put('/registers/update/{id}', [RegisterController::class, 'update'])->middleware('auth');

//Route::get('/registers/orderby', [RegisterController::class, 'orderby'])->middleware('auth')->name('orderby');

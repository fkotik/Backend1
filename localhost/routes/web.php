<?php

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

Route::get('/', [App\Http\Controllers\WebController::class, 'index'])->name('index');
Route::post('/album/{id}', [App\Http\Controllers\WebController::class, 'album'])->name('album');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/add', [App\Http\Controllers\WebController::class, 'create_album'])->name('create_album');
Route::delete('/del/{id}', [App\Http\Controllers\WebController::class, 'del_album'])->name('del_album');
Route::post('/red/{id}', [App\Http\Controllers\WebController::class, 'red_album'])->name('red_album');
Route::get('/pred/{id}', [App\Http\Controllers\WebController::class, 'pred'])->name('pred');

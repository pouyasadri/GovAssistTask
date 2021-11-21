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
Auth::routes();

Route::get('/', [App\Http\Controllers\UrlController::class, 'index'])->name('home')->middleware('auth');
Route::post('/storeUrl',[App\Http\Controllers\UrlController::class,'store'])->name("storeUrl")->middleware('auth');
Route::get('/{short_url}',[App\Http\Controllers\UrlController::class,'show'])->middleware('auth');

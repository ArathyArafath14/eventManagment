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

Route::get('/',[App\Http\Controllers\PublicController::class, 'index'])->name('welcome');
Route::get('event-register/{id}',[App\Http\Controllers\PublicController::class, 'eventRegister']);   
Route::post('event-register-store',[App\Http\Controllers\PublicController::class, 'eventRegisterStore']);   


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'App\Http\Controllers'], function() {
Route::resource('events', 'EventController');
Route::resource('event', 'EventController');
});

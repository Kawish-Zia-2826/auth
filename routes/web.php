<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
Route::view('register','register')->name('register');
Route::view('login','login')->name('login');
Route::post('registerSave',[UserController::class,'register'])->name('registerSave');
Route::post('loginMatch',[UserController::class,'login'])->name('loginMatch');
Route::get('dashboard',[UserController::class,'dashboardPage'])->name('dashboard');
Route::get('logout',[UserController::class,'logout'])->name('logout');

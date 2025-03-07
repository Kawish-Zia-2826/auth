<?php

use App\Http\Middleware\Test;
use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class,'identify']);
Route::view('register', 'register')->name('register');
// ->middleware(Test::class);

Route::view('login','login')->name('login');
Route::post('registerSave',[UserController::class,'register'])->name('registerSave');
Route::post('loginMatch',[UserController::class,'login'])->name('loginMatch');
Route::get('/profile/{id}',[UserController::class , 'ViwProfile'])->name('profile.show');

Route::get('/post/{id}',[UserController::class , 'ViwPost'])->name('post.show');
Route::get('/UpdatePost/{id}',[UserController::class , 'UpdatePost'])->name('UpdatePost');


// Route::get('dashboard',[UserController::class,'dashboardPage'])->name('dashboard')->middleware(['isValid:reader',Test::class]);





// Route::get('dashboard/inner:reader',[UserController::class,'inner'])->name('inner')->middleware(ValidUser::class,Test::class);

Route::get('logout',[UserController::class,'logout'])->name('logout');
// Route::middleware(['ok-user'])->group(function(){
//     Route::get('dashboard',[UserController::class,'dashboardPage'])->name('dashboard');
// });





Route::get('dashboard',[UserController::class,'dashboardPage'])->name('dashboard');
// ->middleware(ValidUser::class);
// ->can('isAdmin');
// ->middleware(['auth','isValid:admin']);





Route::get('dashboard/inner:reader',[UserController::class,'inner'])->name('inner');
// ->middleware(['auth','isAdmin:admin']);



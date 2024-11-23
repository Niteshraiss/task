<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class,'index'])->name('index');
Route::get('/login',function(){return view("login");
})->name('login');
Route::get('/get/city',[UserController::class,'getcity'])->name('city');
Route::post('/register',[UserController::class,'store'])->name('register');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/dashboard',[UserController::class,'dashboard'])->name('dashboard');
    Route::delete('/logout',[UserController::class,'logout'])->name('logout');
});

Route::get('/login-check',[UserController::class,'login'])->name('logincheck');
Route::fallback(function(){
    return redirect()->route('index');
});


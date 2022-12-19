<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;


Route::get('/' , [Controller::class, 'login'])->middleware('alreadyLogged');
Route::get('/login' , [Controller::class, 'login'])->middleware('alreadyLogged');
Route::get('/register' , [Controller::class, 'registration'])->middleware('alreadyLogged');
Route::post('/register-user' , [Controller::class, 'register_user'])->name('register-user');
Route::post('/login-user' , [Controller::class, 'login_user'])->name('login-user');
Route::get('/add_product' , [Controller::class, 'add_product_page'])->middleware('isLoggedIn');
Route::post('/add_product' , [Controller::class, 'add_product'])->name('add-product')->middleware('isLoggedIn');
Route::get('/product' , [Controller::class, 'product'])->name('product')->middleware('isLoggedIn');
Route::get('/profile' , [Controller::class, 'profile'])->name('profile')->middleware('isLoggedIn');
Route::get('/logout' , [Controller::class, 'logout']);
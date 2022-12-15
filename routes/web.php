<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login' , [Controller::class, 'login']);
Route::get('/register' , [Controller::class, 'registration']);

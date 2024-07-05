<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth', 'role:admin'], function () {
    Route::get('/admin-home', [HomeController::class, 'adminHome'])->name('admin.home');
});
Route::group(['middleware' => 'auth', 'role:super-admin'], function () {
    Route::get('/super-home', [HomeController::class, 'superHome'])->name('super.home');
});

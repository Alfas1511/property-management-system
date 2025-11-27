<?php

use App\Http\Controllers\Admin\Auth\Login\LoginController;
use App\Http\Controllers\Admin\Auth\Register\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard.dashboard');
});

Route::get('login', [LoginController::class, 'loginPage'])->name('loginPage');
Route::get('register', [RegisterController::class, 'registrationPage'])->name('registrationPage');

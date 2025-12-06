<?php

use App\Http\Controllers\Admin\Auth\Login\LoginController;
use App\Http\Controllers\Admin\Auth\Register\RegisterController;
use App\Http\Controllers\Admin\PropertyManagement\PropertyController;
use App\Http\Controllers\Admin\UserManagement\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard.dashboard');
})->name('dashboard');

Route::get('login', [LoginController::class, 'loginPage'])->name('loginPage');
Route::get('register', [RegisterController::class, 'registrationPage'])->name('registrationPage');

Route::get('tables', function () {
    return view('admin.dashboard.defaults.tables');
})->name('tables');


Route::get('forms', function () {
    return view('admin.dashboard.defaults.forms');
})->name('forms');

// User Management Endpoints
Route::resource('user', UserController::class);

// Property Management Endpoints
Route::resource('property', PropertyController::class);

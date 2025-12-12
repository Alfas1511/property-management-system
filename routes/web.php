<?php

use App\Http\Controllers\ActivityLog\ActivityLogController;
use App\Http\Controllers\Admin\Auth\Login\LoginController;
use App\Http\Controllers\Admin\Auth\Register\RegisterController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\PropertyManagement\OptionTypeController;
use App\Http\Controllers\Admin\PropertyManagement\PropertyController;
use App\Http\Controllers\Admin\PropertyManagement\PropertyTypeController;
use App\Http\Controllers\Admin\UserManagement\UserController;
use App\Http\Controllers\Admin\UserManagement\UserConvertRequestController;
use Illuminate\Support\Facades\Route;

// Route::get('tables', function () {
//     return view('admin.dashboard.defaults.tables');
// })->name('tables');

// Route::get('forms', function () {
//     return view('admin.dashboard.defaults.forms');
// })->name('forms');

Route::get('/', [RegisterController::class, 'registrationPage'])->name('registrationPage');
Route::post('register', [RegisterController::class, 'registration'])->name('register');

Route::get('login', [LoginController::class, 'loginPage'])->name('loginPage');
Route::post('login', [LoginController::class, 'login'])->name('login');


Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    // Dashboard Endpoints
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // User Management Endpoints
    Route::resource('activity-log', ActivityLogController::class);

    // User Management Endpoints
    Route::resource('user', UserController::class);
    // Property Management Endpoints
    Route::resource('property', PropertyController::class);
    Route::delete('/property/image/{id}', [PropertyController::class, 'deleteImage'])->name('property.image.delete');
    Route::resource('property-type', PropertyTypeController::class);
    Route::resource('option-type', OptionTypeController::class);
});

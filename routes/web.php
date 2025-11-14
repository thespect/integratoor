<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;

// ================================
// LOGIN (PÚBLICO)
// ================================
Route::get('/login', function () {
    return view('login');
})->name('login.view');

Route::post('/login',[AuthController::class,'login'])
    ->name('login.process');

// ================================
// REGISTER (PÚBLICO)
// ================================
Route::get('/register', function () {
    return view('register');
})->name('register.view');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');

// ================================
// LOGOUT
// ================================
Route::get('/logout',[AuthController::class,'logout'])
    ->name('logout');

// ================================
// RUTAS PROTEGIDAS CON AUTH
// ================================
Route::middleware('auth')->group(function() {

    Route::get('/DashboardRoles',[RoleController::class,'index'])
        ->name('dashboard.roles');

    Route::post('/DashboardRoles',[RoleController::class,'store'])
        ->name('dashboard.roles.store');

});

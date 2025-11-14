<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;

// ======================================
// LOGIN (PÚBLICO)
// ======================================
Route::get('/login', function () {
    return view('login');  // Vista del login con el modal del registro
})->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

// ======================================
// REGISTRO (DESDE MODAL EN LOGIN)
// ======================================
Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');

// ======================================
// LOGOUT
// ======================================
Route::get('/logout', [AuthController::class, 'logout'])
    ->name('logout');

// ======================================
// RUTAS PROTEGIDAS POR AUTH
// ======================================
Route::middleware('auth')->group(function () {

    Route::get('/DashboardRoles',[RoleController::class,'index'])
    ->name('dashboard.roles');

    Route::post('/DashboardRoles', [RoleController::class, 'store'])
        ->name('dashboard.roles.store');

});

// ======================================
// REDIRECCIÓN POR DEFECTO
// ======================================
Route::get('/', function () {
    return redirect('/login');
});

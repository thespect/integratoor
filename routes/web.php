<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('welcome');
});

// ******* Roles Routes *******
Route::get('/DashboardRoles',[RoleController::class,'index'])
    ->name('dashboard.roles');

Route::post('/DashboarRoles',[RoleController::class,'store'])
    ->name('dashboard.roles.store');
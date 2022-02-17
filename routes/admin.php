<?php

use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:admin']], function() {
    Route::get('/admin/dashboard', [AdminUserController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', function() {
        return "users";
    });
});

Route::get('/admin/register', [AdminUserController::class, 'registerForm'])
                ->middleware('guest')
                ->name('admin.registerForm');

Route::post('/admin/register', [AdminUserController::class, 'register'])
                ->middleware('guest')
                ->name('admin.register');

Route::get('/admin/login', [AdminUserController::class, 'loginForm'])
                ->middleware('guest')
                ->name('admin.loginForm');

Route::post('/admin/login', [AdminUserController::class, 'login'])
                ->middleware('guest')
                ->name('admin.login');

Route::post('/admin/logout', [AdminUserController::class, 'logout'])
                ->middleware('auth:admin')
                ->name('admin.logout');
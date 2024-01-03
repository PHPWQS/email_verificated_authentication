<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('', 'main.index')->name('index');

Route::prefix('auth')->middleware('guest')->group(function() {
  Route::get('register', [AuthController::class, 'register'])->name('auth.register');
  Route::get('login', [AuthController::class, 'login'])->name('auth.login');
  Route::get('user/confirmation/{id}', [AuthController::class, 'confirmation'])->name('auth.confirmation');
  
  Route::post('register', [AuthController::class, 'register_user'])->name('auth.create');
  Route::post('user/confirmation', [AuthController::class, 'confirm_user'])->name('auth.confirm_user');
  Route::post('login', [AuthController::class, 'login_user'])->name('auth.login_user');
});

Route::get('user/logout', [AuthController::class, 'logout'])->name('user.logout');
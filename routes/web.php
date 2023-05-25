<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware('guest')->group(function () {
  Route::get('/', HomeController::class)->name('home.get');
  Route::get('login', [AuthController::class, 'index'])->name('login.get');
  Route::post('login', [AuthController::class, 'postLogin'])->name('login.post');
  Route::get('register', [AuthController::class, 'registration'])->name('register.get');
  Route::post('register', [AuthController::class, 'postRegistration'])->name('register.post');
});

Route::middleware('auth')->group(function () {
  Route::get('logout', [AuthController::class, 'logout'])->name('logout.get');
  Route::get('dashboard', DashboardController::class)->name('dashboard.get');
  Route::resource('location', LocationController::class)->only(['store', 'edit', 'update', 'destroy']);
});

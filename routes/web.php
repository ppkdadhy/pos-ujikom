<?php

use App\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login_action', [AuthController::class, 'login'])->name('login_action');

Route::middleware(['auth', 'Admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index']);
    Route::resource('product', ProductController::class);
});

Route::middleware(['auth', 'Kasir'])->group(function () {
    Route::get('kasir/dashboard', [HomeController::class, 'indexKasir']);
});

Route::middleware(['auth', 'Pimpinan'])->group(function () {
    Route::get('pimpinan/dashboard', [HomeController::class, 'indexPimpinan']);
});

Route::post('logout', [AuthController::class, 'logout']);

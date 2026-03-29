<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminMaterialController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentMaterialController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/materials', [StudentMaterialController::class, 'index'])->name('materials.index');
    Route::get('/materials/{material:slug}', [StudentMaterialController::class, 'show'])->name('materials.show');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/materials', [AdminMaterialController::class, 'index'])->name('admin.materials.index');
    Route::get('/materials/create', [AdminMaterialController::class, 'create'])->name('admin.materials.create');
    Route::post('/materials', [AdminMaterialController::class, 'store'])->name('admin.materials.store');
    Route::get('/materials/{material}/edit', [AdminMaterialController::class, 'edit'])->name('admin.materials.edit');
    Route::put('/materials/{material}', [AdminMaterialController::class, 'update'])->name('admin.materials.update');
    Route::delete('/materials/{material}', [AdminMaterialController::class, 'destroy'])->name('admin.materials.destroy');
});

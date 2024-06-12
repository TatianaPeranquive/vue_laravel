<?php

use App\Http\Controllers\cajeroController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\RoleController;

Route::get('/', [DashboardController::class, 'index']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/categories',CategoryController::class);
Route::resource('/lessons', LessonController::class);
Route::resource('/roles',RoleController::class);
Route::resource('/cajero',CajeroController::class);
Route::resource('/retiro',CajeroController::class);
require __DIR__.'/auth.php';

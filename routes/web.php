<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::post('/dashboard/foods', [DashboardController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.foods.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/foods', [DashboardController::class, 'store'])->name('dashboard.foods.store');
    Route::get('/dashboard/foods/{id}/edit', [DashboardController::class, 'edit'])->name('dashboard.foods.edit');
    Route::put('/dashboard/foods/{id}', [DashboardController::class, 'update'])->name('dashboard.foods.update');
    Route::delete('/dashboard/foods/{id}', [DashboardController::class, 'destroy'])->name('dashboard.foods.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/foods', [FoodController::class, 'index'])->name('foods.index');
    Route::post('/foods', [FoodController::class, 'store'])->name('foods.store');
});

require __DIR__.'/auth.php';

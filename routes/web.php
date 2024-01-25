<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TournamentsController;

use Illuminate\Support\Facades\Route;

Route::prefix('')->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('main.index');

    Route::prefix('/news')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('news.index');
        Route::get('/{news}', [NewsController::class, 'show'])->name('news.show');
    });

    Route::prefix('/partners')->group(function () {
        Route::get('/', [PartnersController::class, 'index'])->name('partners.index');
    });

    Route::prefix('/management')->group(function () {
        Route::get('/', [ManagementController::class, 'index'])->name('management.index');
    });

    Route::prefix('/tournaments')->group(function () {
        Route::get('/', [TournamentsController::class, 'active'])->name('tournaments.active');
        Route::get('/completed', [TournamentsController::class, 'completed'])->name('tournaments.completed');
        Route::get('/{tournament}', [TournamentsController::class, 'show'])->name('tournaments.show');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('/dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'show'])->name('dashboard.index');
        Route::get('/edit', [DashboardController::class, 'edit'])->name('dashboard.edit');
        Route::put('/edit', [DashboardController::class, 'update'])->name('dashboard.update');
    });
});

require __DIR__.'/auth.php';

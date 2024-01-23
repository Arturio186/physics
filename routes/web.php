<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\ManagementController;

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
    // Артура коммент
    Route::prefix('/management')->group(function () {
        Route::get('/', [ManagementController::class, 'index'])->name('management.index');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    ///Миша
});

require __DIR__.'/auth.php';
//ваня сюда обратно даже даже жиес бмв для тех кто спешит мерседес для тех кто уже успел
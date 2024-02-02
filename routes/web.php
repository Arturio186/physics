<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TournamentsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CommerceController;
use App\Http\Controllers\RefereeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;

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

    Route::prefix('/teams')->group(function () {
        Route::get('/show/{team}', [TeamController::class, 'show'])->name('teams.show');
    });

    Route::prefix('/commerce')->group(function () {
        Route::get('', [CommerceController::class, 'index'])->name('commerce.index');
    });

    Route::prefix('/documents')->group(function () {
        Route::get('', [DocumentController::class, 'index'])->name('documents.index');
    });
    
    

    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events/store', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{EventDay}', [EventController::class, 'show'])->name('events.show');
    Route::get('/events/{event}/gallery', [EventController::class, 'showGallery'])->name('events.showGallery');
    Route::post('/events/{event}/gallery/upload', [EventController::class, 'uploadGallery'])->name('events.uploadToGallery');
    Route::delete('/events/gallery/{galleryItem}', [EventController::class, 'deleteGalleryItem'])->name('events.deleteGalleryItem');

    
    Route::get('/events/{event}/days', [EventController::class, 'showDays'])->name('events.days');
    Route::post('/events/{event}/days', [EventController::class, 'storeDays'])->name('events.days.store');

    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::post('/gallery/upload', [GalleryController::class, 'upload'])->name('gallery.upload');
    Route::put('/gallery/update/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    /*
    Изменил web.php, main.blade.php в layouts, inedx.blade.php в gallary

    */
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('/dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'show'])->name('dashboard.index');
        Route::get('/edit', [DashboardController::class, 'edit'])->name('dashboard.edit'                                                                                                           );
        Route::put('/edit', [DashboardController::class, 'update'])->name('dashboard.update');

        Route::post('/uploadAvatar', [DashboardController::class, 'uploadAvatar'])->name('uploadAvatar');
    });

    Route::prefix('/referee')->group(function () {
        Route::get('/{tournament}/create', [RefereeController::class, 'add'])->name('referee.add');
        Route::post('/{tournament}/create', [RefereeController::class, 'store'])->name('referee.store');
    });

    Route::prefix('/teams')->group(function () {
        Route::get('/create', [TeamController::class, 'add'])->name('teams.add');
        Route::post('/create', [TeamController::class, 'store'])->name('teams.store');
        Route::get('/join/{team}', [TeamController::class, 'invite'])->name('teams.invite');
        Route::post('/join/{team}', [TeamController::class, 'join'])->name('teams.join');
    });
});

require __DIR__.'/auth.php';


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

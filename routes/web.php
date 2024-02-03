<?php

use Illuminate\Support\Facades\Route;

Route::prefix('')->group(function () {
    Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('main.index');

    Route::prefix('/news')->group(function () {
        Route::get('/', [App\Http\Controllers\NewsController::class, 'index'])->name('news.index');
        Route::get('/{news}', [App\Http\Controllers\NewsController::class, 'show'])->name('news.show');
    });

    Route::prefix('/partners')->group(function () {
        Route::get('/', [App\Http\Controllers\PartnersController::class, 'index'])->name('partners.index');
    });

    Route::prefix('/management')->group(function () {
        Route::get('/', [App\Http\Controllers\ManagementController::class, 'index'])->name('management.index');
    });
    Route::prefix('/tournaments')->group(function () {
        Route::get('/', [App\Http\Controllers\TournamentsController::class, 'active'])->name('tournaments.active');
        Route::get('/completed', [App\Http\Controllers\TournamentsController::class, 'completed'])->name('tournaments.completed');
        Route::get('/{tournament}', [App\Http\Controllers\TournamentsController::class, 'show'])->name('tournaments.show');
    });

    Route::prefix('/teams')->group(function () {
        Route::get('/show/{team}', [App\Http\Controllers\TeamController::class, 'show'])->name('teams.show');
    });

    Route::prefix('/commerce')->group(function () {
        Route::get('', [App\Http\Controllers\CommerceController::class, 'index'])->name('commerce.index');
    });

    Route::prefix('/documents')->group(function () {
        Route::get('', [App\Http\Controllers\DocumentController::class, 'index'])->name('documents.index');
    });
    
    Route::prefix('/events')->group(function () {
        Route::get('/', [App\Http\Controllers\EventController::class, 'index'])->name('events.index');
        Route::get('/create', [App\Http\Controllers\EventController::class, 'create'])->name('events.create');
        Route::post('/create', [App\Http\Controllers\EventController::class, 'store'])->name('events.store');
        Route::delete('/{event}',  [App\Http\Controllers\EventController::class, 'destroy'])->name('events.destroy');

        Route::get('/{EventDay}', [App\Http\Controllers\EventController::class, 'show'])->name('events.show');
        Route::get('/{event}/gallery', [App\Http\Controllers\EventController::class, 'showGallery'])->name('events.showGallery');
        Route::post('/{event}/gallery/upload', [App\Http\Controllers\EventController::class, 'uploadGallery'])->name('events.uploadToGallery');
        Route::delete('/gallery/{galleryItem}', [App\Http\Controllers\EventController::class, 'deleteGalleryItem'])->name('events.deleteGalleryItem');

        Route::get('/{event}/days', [App\Http\Controllers\EventController::class, 'showDays'])->name('events.days');
        Route::post('/{event}/days', [App\Http\Controllers\EventController::class, 'storeDays'])->name('events.days.store');
        Route::delete('/{event}/days/{EventDay}', [App\Http\Controllers\EventController::class, 'destroyDays'])->name('events.days.destroy');
    });

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('/dashboard')->group(function () {
        Route::get('/', [App\Http\Controllers\DashboardController::class, 'show'])->name('dashboard.index');
        Route::get('/edit', [App\Http\Controllers\DashboardController::class, 'edit'])->name('dashboard.edit'                                                                                                           );
        Route::put('/edit', [App\Http\Controllers\DashboardController::class, 'update'])->name('dashboard.update');

        Route::post('/uploadAvatar', [App\Http\Controllers\DashboardController::class, 'uploadAvatar'])->name('uploadAvatar');
    });

    Route::prefix('/referee')->group(function () {
        Route::get('/{tournament}/create', [App\Http\Controllers\RefereeController::class, 'add'])->name('referee.add');
        Route::post('/{tournament}/create', [App\Http\Controllers\RefereeController::class, 'store'])->name('referee.store');
    });

    Route::prefix('/teams')->group(function () {
        Route::get('/create', [App\Http\Controllers\TeamController::class, 'add'])->name('teams.add');
        Route::post('/create', [App\Http\Controllers\TeamController::class, 'store'])->name('teams.store');
        Route::get('/join/{team}', [App\Http\Controllers\TeamController::class, 'invite'])->name('teams.invite');
        Route::post('/join/{team}', [App\Http\Controllers\TeamController::class, 'join'])->name('teams.join');
    });
});

require __DIR__.'/auth.php';


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

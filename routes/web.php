<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\AdminAuth;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('welcome');
})->name('Home');
Route::get('/events/{event}', [EventController::class, 'show'])->name('public.events.show');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Dashboard Routes
Route::middleware(['auth', 'verified', AdminAuth::class])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Banner Routes
    Route::get('/dashboard/banner', [BannerController::class, 'index'])->name('banner.index');
    Route::post('/dashboard/banner', [BannerController::class, 'store'])->name('banner.store');
    Route::post('/dashboard/banners/bulk-delete', [BannerController::class, 'bulkDelete'])->name('banner.bulkDelete');

    // Event Routes
    Route::get('/dashboard/events', [EventController::class, 'index'])->name('events.index'); // List all events
    Route::get('/dashboard/events/create', [EventController::class, 'create'])->name('events.create'); // Create event form
    Route::post('/dashboard/events', [EventController::class, 'store'])->name('events.store'); // Store event
    Route::get('/dashboard/events/{event}', [EventController::class, 'show'])->name('events.show'); // admin event display
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\AdminAuth;

Route::get('/', function () {
    return view('welcome');
})->name('Home');

// Route::get('/dashboard', [DashboardController::class, 'index'])
//     ->middleware(['auth', 'verified',AdminAuth::class]) 
//     ->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth','verified',AdminAuth::class])->group(function () {
    Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');;
    Route::get('/dashboard/banner', [BannerController::class, 'index'])->name('banner.index');
    Route::post('/dashboard/banner', [BannerController::class, 'store'])->name('banner.store');
    Route::post('/dashboard/banners/bulk-delete', [BannerController::class, 'bulkDelete'])->name('banner.bulkDelete');
});
require __DIR__.'/auth.php';

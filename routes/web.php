<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/banner', [BannerController::class, 'index'])->name('banner.index');
    Route::post('/dashboard/banner', [BannerController::class, 'store'])->name('banner.store');
    Route::post('/dashboard/banners/bulk-delete', [BannerController::class, 'bulkDelete'])->name('banner.bulkDelete');
});
require __DIR__.'/auth.php';
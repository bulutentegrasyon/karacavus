<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

// ─── Ön Yüz ─────────────────────────────────────────────────────────────────
Route::get('/', fn() => view('welcome'));

// ─── Admin Panel ─────────────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    Route::get('/', fn() => redirect()->route('admin.posts.index'));

    // Blog
    Route::resource('posts', Admin\PostController::class)->except('show');
    Route::resource('blog-categories', Admin\BlogCategoryController::class)->except('show');

    // Hizmetler
    Route::resource('services', Admin\ServiceController::class)->except('show');

    // Projeler
    Route::resource('projects', Admin\ProjectController::class)->except('show');

    // Ayarlar
    Route::get('settings', [Admin\SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [Admin\SettingController::class, 'update'])->name('settings.update');
});

// ─── Breeze Profile ──────────────────────────────────────────────────────────
Route::get('/dashboard', fn() => redirect()->route('admin.posts.index'))
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

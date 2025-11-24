<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
});

Route::middleware(['auth'])->group(function () {
    
    // Admin Routes
    Route::middleware(['role:admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
        // Add other admin routes here (e.g., user management, post management)
        Route::get('/settings', [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('admin.settings');
        Route::put('/settings', [App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('admin.settings.update');
    });

    // Teacher Routes
    Route::middleware(['role:teacher'])->prefix('teacher')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'teacher'])->name('teacher.dashboard');
        // Add teacher routes here (e.g., my posts)
        Route::get('/posts/create', [PostController::class, 'create'])->name('teacher.posts.create');
        Route::post('/posts', [PostController::class, 'store'])->name('teacher.posts.store');
    });

    // Student Routes
    Route::middleware(['role:student'])->prefix('student')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'student'])->name('student.dashboard');
        // Add student routes here
    });

    // Parent Routes
    Route::middleware(['role:parent'])->prefix('parent')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'parent'])->name('parent.dashboard');
        // Add parent routes here
    });

    // Comments (any authenticated user can comment)
    Route::post('/posts/{post}/comments', [PostController::class, 'commentStore'])->name('posts.comments.store');
});

require __DIR__.'/auth.php';

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    
    // Admin Routes
    Route::middleware(['role:admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
        // Add other admin routes here (e.g., user management, post management)
    });

    // Teacher Routes
    Route::middleware(['role:teacher'])->prefix('teacher')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'teacher'])->name('teacher.dashboard');
        // Add teacher routes here (e.g., my posts)
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
});

require __DIR__.'/auth.php';

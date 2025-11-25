<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeacherController;
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

// Si necesitas usar PostController, usa la ruta completa en cada ruta
Route::get('/', [App\Http\Controllers\PostController::class, 'index'])->name('home');
Route::get('/posts/{slug}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
});

Route::middleware(['auth'])->group(function () {
    
    // Admin Routes
    Route::middleware(['role:admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
        Route::get('/settings', [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('admin.settings');
        Route::put('/settings', [App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('admin.settings.update');
    }); // <- FALTABA ESTE CIERRE

    // Teacher Routes
    Route::middleware(['role:teacher'])->prefix('teacher')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'teacher'])->name('teacher.dashboard');
        
        // Usar la ruta completa para PostController
        Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('teacher.posts.create');
        Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('teacher.posts.store');
        
        // Rutas del TeacherController
        Route::get('/students', [TeacherController::class, 'students'])->name('teacher.students');
        Route::get('/students/{id}', [TeacherController::class, 'studentDetail'])->name('teacher.students.show');
        
        // Teacher Routes - Materiales de Clase
        Route::get('/materials', [TeacherController::class, 'materials'])->name('teacher.materials');
        Route::get('/materials/create', [TeacherController::class, 'createMaterial'])->name('teacher.materials.create');
        Route::post('/materials', [TeacherController::class, 'storeMaterial'])->name('teacher.materials.store');
    }); // <- FALTABA ESTE CIERRE

    // Student Routes
    Route::middleware(['role:student'])->prefix('student')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'student'])->name('student.dashboard');
    }); // <- FALTABA ESTE CIERRE

    // Parent Routes
    Route::middleware(['role:parent'])->prefix('parent')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'parent'])->name('parent.dashboard');
    }); // <- FALTABA ESTE CIERRE

    // Comments (any authenticated user can comment)
    Route::post('/posts/{post}/comments', [App\Http\Controllers\PostController::class, 'commentStore'])->name('posts.comments.store');

    // Allowed Students (Admin & Teacher)
    Route::post('/allowed-students', [App\Http\Controllers\AllowedStudentController::class, 'store'])->name('allowed_students.store');

    // Student-Parent Relationship
    Route::post('/student-parent', [App\Http\Controllers\StudentParentController::class, 'store'])->name('student_parent.store');
    Route::delete('/student-parent', [App\Http\Controllers\StudentParentController::class, 'destroy'])->name('student_parent.destroy');
}); // <- ESTE ES EL CIERRE DEL GRUPO AUTH PRINCIPAL

require __DIR__.'/auth.php';
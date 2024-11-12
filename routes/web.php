<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DepartmentController; // Add this line

// Default route
Route::get('/', function () {
    return view('welcome');
});

// Home route
Route::get('/home', [HomeController::class, 'index']);

// Contact route
Route::get('/contact', [ContactController::class, 'index']);

// Student routes
Route::get('/student', [StudentController::class, 'index']);
Route::get('/student/tambah', [StudentController::class, 'create']);
Route::post('/student/store', [StudentController::class, 'store']);

// Grade route
Route::get('/grade', [GradeController::class, 'index']);

// Department routes
Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index'); // List departments
Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create'); // Create department form
Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store'); // Store department
Route::get('/departments/{id}', [DepartmentController::class, 'show'])->name('departments.show'); // Show department
Route::get('/departments/{id}/edit', [DepartmentController::class, 'edit'])->name('departments.edit'); // Edit department form
Route::put('/departments/{id}', [DepartmentController::class, 'update'])->name('departments.update'); // Update department
Route::delete('/departments/{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy'); // Delete department

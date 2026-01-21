<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');





Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/annee', [AcademicYearController::class, 'index'])->name('academic-years.index');
    Route::get('/dashboard/annee/create', [AcademicYearController::class, 'create'])->name('academic-years.create');
    Route::post('/dashboard/annee', [AcademicYearController::class, 'store'])->name('academic-years.store');
    Route::get('/dashboard/annee/{academicYear}/edit', [AcademicYearController::class, 'edit'])->name('academic-years.edit');
    Route::put('/dashboard/annee/{academicYear}', [AcademicYearController::class, 'update'])->name('academic-years.update');
    Route::delete('/dashboard/annee/{academicYear}', [AcademicYearController::class, 'destroy'])->name('academic-years.destroy');
    Route::post('/dashboard/annee/{academicYear}/toggle', [AcademicYearController::class, 'toggleActive'])->name('academic-years.toggle');
    Route::get('/dashboard/specialite', [DashboardController::class, 'specialite'])->name('dashboard.specialite');
    Route::get('/dashboard/modules', [DashboardController::class, 'modules'])->name('dashboard.modules');
    Route::get('/dashboard/teachers', [DashboardController::class, 'teachers'])->name('dashboard.teachers');
    Route::get('/dashboard/students', [DashboardController::class, 'students'])->name('dashboard.students');
    Route::get('/dashboard/evaluations', [DashboardController::class, 'evaluations'])->name('dashboard.evaluations');
    Route::get('/dashboard/reports', [DashboardController::class, 'reports'])->name('dashboard.reports');
});

require __DIR__ . '/auth.php';

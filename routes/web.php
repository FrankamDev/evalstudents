<?php

use App\Http\Controllers\AcademicYearController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\StudentController;

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



    Route::get('/dashboard/specialite', [SpecialtyController::class, 'index'])->name('specialties.index');
    Route::get('/dashboard/specialite/create', [SpecialtyController::class, 'create'])->name('specialties.create');
    Route::post('/dashboard/specialite', [SpecialtyController::class, 'store'])->name('specialties.store');
    Route::get('/dashboard/specialite/{specialty}/edit', [SpecialtyController::class, 'edit'])->name('specialties.edit');
    Route::put('/dashboard/specialite/{specialty}', [SpecialtyController::class, 'update'])->name('specialties.update');
    Route::delete('/dashboard/specialite/{specialty}', [SpecialtyController::class, 'destroy'])->name('specialties.destroy');


    Route::get('/dashboard/modules', [ModuleController::class, 'index'])->name('modules.index');
    Route::get('/dashboard/modules/create', [ModuleController::class, 'create'])->name('modules.create');
    Route::post('/dashboard/modules', [ModuleController::class, 'store'])->name('modules.store');
    Route::get('/dashboard/modules/{module}/edit', [ModuleController::class, 'edit'])->name('modules.edit');
    Route::put('/dashboard/modules/{module}', [ModuleController::class, 'update'])->name('modules.update');
    Route::delete('/dashboard/modules/{module}', [ModuleController::class, 'destroy'])->name('modules.destroy');

    Route::get('/dashboard/evaluations', [EvaluationController::class, 'index'])->name('evaluations.index');
    Route::get('/dashboard/evaluations/create', [EvaluationController::class, 'create'])->name('evaluations.create');
    Route::post('/dashboard/evaluations', [EvaluationController::class, 'store'])->name('evaluations.store');
    Route::get('/dashboard/evaluations/{evaluation}/edit', [EvaluationController::class, 'edit'])->name('evaluations.edit');
    Route::put('/dashboard/evaluations/{evaluation}', [EvaluationController::class, 'update'])->name('evaluations.update');
    Route::delete('/dashboard/evaluations/{evaluation}', [EvaluationController::class, 'destroy'])->name('evaluations.destroy');


    Route::get('/dashboard/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/dashboard/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/dashboard/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/dashboard/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/dashboard/students/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/dashboard/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');




    Route::get('/dashboard/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/dashboard/reports/{student}', [ReportController::class, 'show'])->name('reports.show');
    Route::get('/dashboard/reports/{report}/pdf', [ReportController::class, 'exportPdf'])->name('reports.pdf');
    Route::get('/dashboard/reports/{report}/excel', [ReportController::class, 'exportExcel'])->name('reports.excel');


    // Route::get('/dashboard/modules', [DashboardController::class, 'modules'])->name('dashboard.modules');
    // Route::get('/dashboard/teachers', [DashboardController::class, 'teachers'])->name('dashboard.teachers');
    // Route::get('/dashboard/students', [DashboardController::class, 'students'])->name('dashboard.students');
    // Route::get('/dashboard/evaluations', [DashboardController::class, 'evaluations'])->name('dashboard.evaluations');
    // Route::get('/dashboard/reports', [DashboardController::class, 'reports'])->name('dashboard.reports');
});

require __DIR__ . '/auth.php';

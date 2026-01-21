<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Module;
use App\Models\Specialty;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        return view('index', [
            'academicYearsCount'   => AcademicYear::count(),
            'activeAcademicYear'   => AcademicYear::where('is_active', true)->first(),
            'specialtiesCount'     => Specialty::count(),
            'modulesCount'         => Module::count(),
            'studentsCount'        => Student::count(),
            'latestModules'        => Module::with('specialty')
                ->latest()
                ->take(5)
                ->get(),
        ]);
    }
    // public function teachers()
    // {
    //     return view('dashboard.teacher');
    // }

    // public function students()
    // {
    //     return view('dashboard.students');
    // }

    // public function evaluations()
    // {
    //     return view('dashboard.evaluations');
    // }

    // public function reports()
    // {
    //     return view('dashboard.reports');
    // }
}

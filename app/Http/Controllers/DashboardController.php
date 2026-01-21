<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index'); // Vue par défaut (renomme dashboard.blade.php en index.blade.php si needed)
    }

    public function annee()
    {
        return view('dashboard.annee');
    }

    public function specialite()
    {
        return view('dashboard.specialte');
    }

    public function modules()
    {
        return view('dashboard.modules');
    }

    public function teachers()
    {
        return view('dashboard.teacher');
    }

    public function students()
    {
        return view('dashboard.students');
    }

    public function evaluations()
    {
        return view('dashboard.evaluations');
    }

    public function reports()
    {
        return view('dashboard.reports');
    }
}

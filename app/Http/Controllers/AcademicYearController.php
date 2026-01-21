<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AcademicYearController extends Controller
{

    public function index()
    {
        $academicYears = AcademicYear::orderBy('date_debut', 'desc')->get();
        return view('dashboard.annee.index', compact('academicYears'));
    }


    public function create()
    {
        $academicYears = AcademicYear::all();
        return view('dashboard.annee.create', compact('academicYears'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'libelle'    => ['required', 'string', 'max:255', 'unique:academic_years'],
            'date_debut' => ['required', 'date'],
            'date_fin'   => ['required', 'date', 'after_or_equal:date_debut'],
            'is_active'  => ['boolean'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->boolean('is_active')) {
            AcademicYear::where('is_active', true)->update(['is_active' => false]);
        }

        AcademicYear::create([
            'libelle'    => $request->libelle,
            'date_debut' => $request->date_debut,
            'date_fin'   => $request->date_fin,
            'is_active'  => $request->boolean('is_active'),
        ]);

        return redirect()->route('academic-years.index')
            ->with('success', 'Année académique créée avec succès !');
    }


    public function edit(AcademicYear $academicYear)
    {
        return view('dashboard.annee.edit', compact('academicYear'));
    }


    public function update(Request $request, AcademicYear $academicYear)
    {
        $validator = Validator::make($request->all(), [
            'libelle'    => ['required', 'string', 'max:255', Rule::unique('academic_years')->ignore($academicYear->id)],
            'date_debut' => ['required', 'date'],
            'date_fin'   => ['required', 'date', 'after_or_equal:date_debut'],
            'is_active'  => ['boolean'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->boolean('is_active') && !$academicYear->is_active) {
            AcademicYear::where('is_active', true)->update(['is_active' => false]);
        }

        $academicYear->update([
            'libelle'    => $request->libelle,
            'date_debut' => $request->date_debut,
            'date_fin'   => $request->date_fin,
            'is_active'  => $request->boolean('is_active'),
        ]);

        return redirect()->route('academic-years.index')
            ->with('success', 'Année académique modifiée avec succès !');
    }


    public function destroy(AcademicYear $academicYear)
    {

        $academicYear->delete();

        return redirect()->route('academic-years.index')
            ->with('success', 'Année académique supprimée avec succès !');
    }


    public function toggleActive(AcademicYear $academicYear)
    {
        if ($academicYear->is_active) {
            $academicYear->update(['is_active' => false]);
            $message = 'Année désactivée.';
        } else {

            AcademicYear::where('is_active', true)->update(['is_active' => false]);
            $academicYear->update(['is_active' => true]);
            $message = 'Année activée avec succès !';
        }

        return redirect()->route('academic-years.index')
            ->with('success', $message);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Student;
use App\Models\Module;
use App\Models\AcademicYear;
use App\Models\Evaluations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EvaluationController extends Controller
{
    public function index()
    {
        $evaluations = Evaluations::with(['student', 'module', 'academicYear'])
            ->orderBy('academic_year_id')
            ->orderBy('semester')
            ->orderBy('module_id')
            ->get();

        return view('dashboard.evaluation.index', compact('evaluations'));
    }

    public function create()
    {
        $students = Student::orderBy('last_name')->get();
        $modules = Module::with('specialty')->orderBy('name')->get();
        $academicYears = AcademicYear::orderBy('date_debut', 'desc')->get();

        return view('dashboard.evaluation.create', compact('students', 'modules', 'academicYears'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'student_id'       => ['required', 'exists:students,id'],
            'module_id'        => ['required', 'exists:modules,id'],
            'academic_year_id' => ['required', 'exists:academic_years,id'],
            'semester'         => ['required', 'integer', 'between:1,2'],
            'note'             => ['required', 'numeric', 'between:0,20'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Vérification unicité (bien que déjà dans migration)
        $exists = Evaluations::where([
            'student_id'       => $request->student_id,
            'module_id'        => $request->module_id,
            'academic_year_id' => $request->academic_year_id,
            'semester'         => $request->semester,
        ])->exists();

        if ($exists) {
            return back()->withErrors(['note' => 'Cette évaluation existe déjà pour cet étudiant, module, année et semestre.'])->withInput();
        }

        Evaluations::create([
            'student_id'       => $request->student_id,
            'module_id'        => $request->module_id,
            'academic_year_id' => $request->academic_year_id,
            'semester'         => $request->semester,
            'note'             => $request->note,
        ]);

        return redirect()->route('evaluations.index')
            ->with('success', 'Évaluation enregistrée avec succès !');
    }

    public function edit(Evaluations $evaluation)
    {
        $students = Student::orderBy('last_name')->get();
        $modules = Module::with('specialty')->orderBy('name')->get();
        $academicYears = AcademicYear::orderBy('date_debut', 'desc')->get();

        return view('dashboard.evaluation.edit', compact('evaluation', 'students', 'modules', 'academicYears'));
    }

    public function update(Request $request, Evaluations $evaluation)
    {
        $validator = Validator::make($request->all(), [
            'student_id'       => ['required', 'exists:students,id'],
            'module_id'        => ['required', 'exists:modules,id'],
            'academic_year_id' => ['required', 'exists:academic_years,id'],
            'semester'         => ['required', 'integer', 'between:1,2'],
            'note'             => ['required', 'numeric', 'between:0,20'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Vérification unicité si changement de clés
        if (
            $request->student_id != $evaluation->student_id ||
            $request->module_id != $evaluation->module_id ||
            $request->academic_year_id != $evaluation->academic_year_id ||
            $request->semester != $evaluation->semester
        ) {
            $exists = Evaluations::where([
                'student_id'       => $request->student_id,
                'module_id'        => $request->module_id,
                'academic_year_id' => $request->academic_year_id,
                'semester'         => $request->semester,
            ])->where('id', '!=', $evaluation->id)->exists();

            if ($exists) {
                return back()->withErrors(['note' => 'Cette combinaison existe déjà pour un autre enregistrement.'])->withInput();
            }
        }

        $evaluation->update([
            'student_id'       => $request->student_id,
            'module_id'        => $request->module_id,
            'academic_year_id' => $request->academic_year_id,
            'semester'         => $request->semester,
            'note'             => $request->note,
        ]);

        return redirect()->route('evaluations.index')
            ->with('success', 'Évaluation modifiée avec succès !');
    }

    public function destroy(Evaluations $evaluation)
    {
        $evaluation->delete();

        return redirect()->route('evaluations.index')
            ->with('success', 'Évaluation supprimée avec succès !');
    }
}

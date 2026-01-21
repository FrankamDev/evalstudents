<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Specialty;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with(['specialty', 'academicYear'])
            ->orderBy('last_name')
            ->orderBy('first_name')
            ->get();

        return view('dashboard.student.index', compact('students'));
    }

    public function create()
    {
        $specialties = Specialty::orderBy('name')->get();
        $academicYears = AcademicYear::orderBy('date_debut', 'desc')->get();

        return view('dashboard.student.create', compact('specialties', 'academicYears'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'matricule'        => ['required', 'string', 'max:50', 'unique:students'],
            'first_name'       => ['required', 'string', 'max:255'],
            'last_name'        => ['required', 'string', 'max:255'],
            'specialty_id'     => ['nullable', 'exists:specialties,id'],
            'academic_year_id' => ['nullable', 'exists:academic_years,id'],
            'email'            => ['nullable', 'email', 'max:255', 'unique:students'],
            'phone'            => ['nullable', 'string', 'max:20'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Student::create([
            'matricule'        => $request->matricule,
            'first_name'       => $request->first_name,
            'last_name'        => $request->last_name,
            'specialty_id'     => $request->specialty_id,
            'academic_year_id' => $request->academic_year_id,
            'email'            => $request->email,
            'phone'            => $request->phone,
        ]);

        return redirect()->route('students.index')
            ->with('success', 'Étudiant ajouté avec succès !');
    }

    public function edit(Student $student)
    {
        $specialties = Specialty::orderBy('name')->get();
        $academicYears = AcademicYear::orderBy('date_debut', 'desc')->get();

        return view('dashboard.student.edit', compact('student', 'specialties', 'academicYears'));
    }

    public function update(Request $request, Student $student)
    {
        $validator = Validator::make($request->all(), [
            'matricule'        => ['required', 'string', 'max:50', Rule::unique('students')->ignore($student->id)],
            'first_name'       => ['required', 'string', 'max:255'],
            'last_name'        => ['required', 'string', 'max:255'],
            'specialty_id'     => ['nullable', 'exists:specialties,id'],
            'academic_year_id' => ['nullable', 'exists:academic_years,id'],
            'email'            => ['nullable', 'email', 'max:255', Rule::unique('students')->ignore($student->id)],
            'phone'            => ['nullable', 'string', 'max:20'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $student->update([
            'matricule'        => $request->matricule,
            'first_name'       => $request->first_name,
            'last_name'        => $request->last_name,
            'specialty_id'     => $request->specialty_id,
            'academic_year_id' => $request->academic_year_id,
            'email'            => $request->email,
            'phone'            => $request->phone,
        ]);

        return redirect()->route('students.index')
            ->with('success', 'Étudiant modifié avec succès !');
    }

    // Ajoutez cette méthode dans ReportController

    public function generateAutomatic(Request $request)
    {
        $academicYearId = $request->academic_year_id ?? AcademicYear::where('is_active', true)->first()?->id;
        $semester = $request->semester ?? null; // Si null, génère pour les deux semestres

        if (!$academicYearId) {
            return back()->with('error', 'Aucune année académique active trouvée.');
        }

        $students = Student::where('academic_year_id', $academicYearId)->get();
        $generated = 0;
        $updated = 0;

        foreach ($students as $student) {
            $semestersToProcess = $semester ? [$semester] : [1, 2];

            foreach ($semestersToProcess as $sem) {
                // Récupérer les évaluations pour ce semestre
                $evaluations = Evaluation::where([
                    'student_id'       => $student->id,
                    'academic_year_id' => $academicYearId,
                    'semester'         => $sem,
                ])->get();

                if ($evaluations->isEmpty()) {
                    continue; // Pas d'évaluations pour ce semestre
                }

                // Calcul de la moyenne
                $average = $evaluations->avg('note');

                // Décision et mention
                $decision = $average >= 10 ? 'Admis' : 'Ajourné';
                $mention = match (true) {
                    $average >= 16 => 'Très Bien',
                    $average >= 14 => 'Bien',
                    $average >= 12 => 'Assez Bien',
                    $average >= 10 => 'Passable',
                    default        => 'Insuffisant',
                };

                // Créer ou mettre à jour le report
                $report = Report::updateOrCreate(
                    [
                        'student_id'       => $student->id,
                        'academic_year_id' => $academicYearId,
                        'semester'         => $sem,
                    ],
                    [
                        'average'  => $average,
                        'decision' => $decision,
                        'mention'  => $mention,
                        'remark'   => 'Généré automatiquement', // Ou vide, personnalisable plus tard
                    ]
                );

                if ($report->wasRecentlyCreated) {
                    $generated++;
                } else {
                    $updated++;
                }
            }
        }

        return redirect()->route('reports.index')
            ->with('success', "$generated bulletins générés et $updated mis à jour avec succès !");
    }


    public function destroy(Student $student)
    {
        if ($student->evaluations()->exists()) {
            return back()->with('error', 'Impossible de supprimer : cet étudiant a des évaluations enregistrées.');
        }

        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Étudiant supprimé avec succès !');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Student;
use App\Models\AcademicYear;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentBulletinExport;
use App\Models\Evaluations;

class ReportController extends Controller
{

    public function index()
    {
        $students = Student::with(['specialty', 'academicYear'])
            ->orderBy('last_name')
            ->orderBy('first_name')
            ->get();

        return view('dashboard.report.index', compact('students'));
    }


    public function show(Student $student)
    {
        $activeYear = AcademicYear::where('is_active', true)->first();

        if (!$activeYear) {
            return redirect()->route('reports.index')->with('error', 'Aucune année académique active.');
        }


        $this->generateOrUpdateForStudent($student->id, $activeYear->id);

        $reports = Report::with('academicYear')
            ->where('student_id', $student->id)
            ->orderBy('semester')
            ->get();

        return view('dashboard.report.show', compact('student', 'reports'));
    }


    protected function generateOrUpdateForStudent($studentId, $academicYearId)
    {
        foreach ([1, 2] as $semester) {
            $evaluations = Evaluations::where([
                'student_id'       => $studentId,
                'academic_year_id' => $academicYearId,
                'semester'         => $semester,
            ])->get();

            if ($evaluations->isEmpty()) {
                continue;
            }

            $average = $evaluations->avg('note');

            $decision = $average >= 10 ? 'Admis' : 'Ajourné';
            $mention = match (true) {
                $average >= 16 => 'Très Bien',
                $average >= 14 => 'Bien',
                $average >= 12 => 'Assez Bien',
                $average >= 10 => 'Passable',
                default        => 'Insuffisant',
            };

            Report::updateOrCreate(
                [
                    'student_id'       => $studentId,
                    'academic_year_id' => $academicYearId,
                    'semester'         => $semester,
                ],
                [
                    'average'  => $average,
                    'decision' => $decision,
                    'mention'  => $mention,
                    'remark'   => 'Généré automatiquement le ' . now()->format('d/m/Y'),
                ]
            );
        }
    }


    public function exportPdf(Report $report)
    {
        $pdf = Pdf::loadView('pdf.bulletin', compact('report'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('bulletin_' . $report->student->matricule . '_S' . $report->semester . '.pdf');
    }


    public function exportExcel(Report $report)
    {
        return Excel::download(new StudentBulletinExport($report), 'bulletin_' . $report->student->matricule . '_S' . $report->semester . '.xlsx');
    }
}

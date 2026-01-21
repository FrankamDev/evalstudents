<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class StudentBulletinExport implements FromArray, WithHeadings, WithTitle, ShouldAutoSize
{
    protected $report;

    public function __construct($report)
    {
        $this->report = $report;
    }

    public function array(): array
    {
        return [
            ['ÉTUDIANT', $this->report->student->first_name . ' ' . $this->report->student->last_name],
            ['MATRICULE', $this->report->student->matricule],
            ['ANNÉE ACADÉMIQUE', $this->report->academicYear->libelle],
            ['SEMESTRE', 'S' . $this->report->semester],
            ['MOYENNE', number_format($this->report->average, 2) . ' / 20'],
            ['DÉCISION', $this->report->decision],
            ['MENTION', $this->report->mention],
            ['OBSERVATIONS', $this->report->remark ?? 'Aucune'],
        ];
    }

    public function headings(): array
    {
        return ['Champ', 'Valeur'];
    }

    public function title(): string
    {
        return 'Bulletin S' . $this->report->semester;
    }
}

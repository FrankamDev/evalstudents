<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'first_name',
        'last_name',
        'specialty_id',
        'academic_year_id',
        'email',
        'phone',
    ];

    // Relations
    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluations::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}

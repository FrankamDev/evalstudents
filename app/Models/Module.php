<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [

        'specialty_id',
        'code',
        'name',
        'coefficient',
        'sequence',
    ];

    // Un module appartient à une spécialité
    public function specialty()
    {
        return $this->belongsTo(specialty::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    // Un module peut avoir plusieurs évaluations
    public function evaluations()
    {
        return $this->hasMany(Evaluations::class);
    }
}

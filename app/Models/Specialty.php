<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
    ];

    // Un specialty peut avoir plusieurs étudiants
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    // Un specialty peut avoir plusieurs enseignants
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    // Un specialty peut avoir plusieurs modules
    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}

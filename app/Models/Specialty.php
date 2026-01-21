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


    public function students()
    {
        return $this->hasMany(Student::class);
    }


    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }


    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}

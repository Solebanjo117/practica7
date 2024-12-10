<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'alumno_id', 'semestre', 'fecha_cita', 'turno',
    ];

    // Relación con el alumno
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'alumno_id', 'noctrl');
    }
}

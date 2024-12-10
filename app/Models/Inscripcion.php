<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $fillable = [
        'alumno_id', 'periodo_id', 'semestre', 'estado',
    ];
        protected $table = 'inscripciones';
    // Relación con el modelo Alumno
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'alumno_id', 'noctrl');
    }

    // Relación con el modelo Periodo
    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'periodo_id', 'idPeriodo');
    }
}

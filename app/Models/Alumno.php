<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alumno extends Model
{
    /** @use HasFactory<\Database\Factories\AlumnoFactory> */
    use HasFactory;
    protected $fillable = ['noctrl','nombreAlumno','apellidoPaterno'
    ,'apellidoMaterno','sexo','idCarrera'];
    protected $casts = ['noctrl'=>'string'];
    public $incrementing = false;
    protected $primaryKey = 'noctrl';
    public function carrera():BelongsTo{
        return $this->belongsTo(Carrera::class,'idCarrera');
    }
    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'alumno_grupo', 'alumno_id', 'grupo_id');
    }
    public function archivos()
    {
        return $this->hasMany(Archivo::class, 'noctrl', 'noctrl');  // Relación con la tabla 'archivos'
    }
    public function cita(){
        return $this->hasMany(Cita::class,'alumno_id','noctrl');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grupo extends Model
{
    /** @use HasFactory<\Database\Factories\GrupoFactory> */
    use HasFactory;
    protected $fillable = [
        'nombreGrupo',
        'descripcionGrupo',
        'maxAlumnos',
        'idPeriodo',
        'idMateria',
        'noTrabajador'];
        protected $primaryKey = 'idGrupo';
        public function horarios():HasMany{
            return $this->hasMany(GrupoHorario::class,'idGrupo','idGrupo');
        }
        public function materia()
{
    return $this->belongsTo(Materia::class, 'idMateria');
}
public function alumnos()
{
    return $this->belongsToMany(Alumno::class, 'alumno_grupo', 'grupo_id', 'alumno_id');
}
// Modelo Horario


}

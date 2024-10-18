<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Horario extends Model
{
    /** @use HasFactory<\Database\Factories\HorarioFactory> */
    use HasFactory;
    protected $fillable = ['noTrabajador','idPeriodo','fecha'];
    protected $primaryKey = 'idHorario';
    public function personal():BelongsTo{
        return $this->belongsTo(Personal::class,'noTrabajador');
    }
    public function periodo():BelongsTo{
        return $this->belongsTo(Periodo::class,'idPeriodo');
    }
        public function materias():BelongsToMany{
            return $this->belongsToMany(Materia::class,'horarios_materias','idHorario','idMateria')
            ->withPivot('grupos','totalEstudiante','tipoLugar','lunes',
                        'martes','miercoles','jueves','viernes')->withTimestamps();
        }
}

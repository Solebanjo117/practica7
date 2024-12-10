<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Materia extends Model
{
    /** @use HasFactory<\Database\Factories\MateriaFactory> */
    use HasFactory;
    protected $fillable = ['idMateria','nombreMateria','nivel'
    ,'nombreMediano','nombreCorto','modalidad','idReticula','semestre','creditos'];
    protected $casts = ['idMateria'=>'string'];
    public $incrementing = false;
    protected $primaryKey = 'idMateria';
    public function reticula():BelongsTo{
        return $this->belongsTo(Reticula::class,'idReticula');
    }
    public function horarios():BelongsToMany{
        return $this->belongsToMany(Horario::class,'horarios_materias','idHorario','idMateria')
        ->withPivot('grupos','totalEstudiante','tipoLugar','lunes',
                    'martes','miercoles','jueves','viernes')->withTimestamps();
    }
    function materiasAbiertas():HasMany{
        return $this->hasMany(MateriaAbierta::class,'idMateria','idMateria');
        }
}

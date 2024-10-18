<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HorariosMateria extends Model
{
    /** @use HasFactory<\Database\Factories\HorariosMateriaFactory> */
    use HasFactory;
    protected $fillable = [
      'grupos','totalEstudiantes','idHorario',
      'tipoLugar','idMateria','lunes','martes',
      'miercoles','jueves','viernes'];
      protected $primaryKey = 'idHorarioMateria';
}

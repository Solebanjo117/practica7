<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GrupoHorario extends Model
{
    /** @use HasFactory<\Database\Factories\GrupoHorarioFactory> */
    use HasFactory;
    protected $fillable = ['idGrupo','idLugar','dia','hora'];
    public function grupo():BelongsTo{
        return $this->belongsTo(Grupo::class,'idGrupo');
    }
}

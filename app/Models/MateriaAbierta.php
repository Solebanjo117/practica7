<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MateriaAbierta extends Model
{
    /** @use HasFactory<\Database\Factories\MateriaAbiertaFactory> */
    use HasFactory;
    protected $fillable = [
        'idPeriodo',
        'idMateria',
        'idCarrera'];
        public function materia():BelongsTo{
            return $this->belongsTo(Materia::class,'idMateria');
        }
}

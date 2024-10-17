<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Carrera extends Model
{
    /** @use HasFactory<\Database\Factories\CarreraFactory> */
    use HasFactory;
    protected $primaryKey='idCarrera';
    protected $fillable = ['idCarrera','nombreCarrera','nombreMediano','nombreCorto','idDepto'];
    public $incrementing = false;
    protected $casts = ['idCarrera'=>'string'];
    public function departamento():BelongsTo{
        return $this->belongsTo(Depto::class,'idDepto','idDepto');
    }
    public function alumnos():HasMany{
        return $this->hasMany(Alumno::class,'idCarrera');
    }
}

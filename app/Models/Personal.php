<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Personal extends Model
{
    /** @use HasFactory<\Database\Factories\PersonalFactory> */
    use HasFactory;
    protected $fillable = ['noTrabajador',
    'RFC','nombres','apellidoPaterno','apellidoMaterno','licenciatura',
    'licPasTit','especializacion','espPasTit','maestria','maePasTit',
    'doctorado','docPasTit','idDepto','fechaIngSep','fechaIngIns','idPuesto'];
    public $incrementing = false;
    protected $casts = ['noTrabajador'=>'string'];
    protected $primaryKey ='noTrabajador';
    public function puesto():BelongsTo{
        return $this->belongsTo(Puesto::class,'idPuesto');
    }
    public function depto():BelongsTo{
        return $this->belongsTo(Depto::class,'idDepto');
    }
    public function plazas():BelongsToMany{
        return $this->belongsToMany(Plaza::class,'personal_plazas','idPlaza','RFC')
        ->withPivot('tipoNombramiento')->withTimestamps();
    }
    public function horarios():HasMany{
        return $this->hasMany(Horario::class,'noTrabajador');
    }
}

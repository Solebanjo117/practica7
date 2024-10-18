<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Puesto extends Model
{
    use HasFactory;
    protected $fillable = ['idPuesto','nombre','tipo'];
    protected $casts = ['idPuesto'=>'string'];
    protected $primaryKey='idPuesto';
    public $incrementing = false;
    public function personals():HasMany{
        return $this->hasMany(Personal::class,'idPuesto','idPuesto');
    }
}

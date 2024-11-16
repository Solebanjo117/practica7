<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lugar extends Model
{
    /** @use HasFactory<\Database\Factories\LugarFactory> */
    use HasFactory;
    protected $fillable = [
        'nombre',
        'nombreCorto',
        'edificio_id'];
        public function edificio():BelongsTo{
            return $this->belongsTo(Edificio::class,'edificio_id','id');
        }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Edificio extends Model
{
    /** @use HasFactory<\Database\Factories\EdificioFactory> */
    use HasFactory;
    protected $fillable = [
        'nombre',
        'nombreCorto'];
        public function lugares():HasMany{
            return $this->hasMany(Lugar::class);
        }
}

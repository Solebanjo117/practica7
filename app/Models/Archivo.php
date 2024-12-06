<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;
    protected $fillable = [
        'noctrl', 
        'pago_pdf', 
        'identificacion_pdf', 
        'verificado'
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'noctrl', 'noctrl');
    }
}

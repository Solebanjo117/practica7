<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    use HasFactory;
    protected $fillable = ['idPuesto','nombre','tipo'];
    protected $casts = ['idPuesto'=>'string'];
    protected $primaryKey='idPuesto';
    public $incrementing = false;
}

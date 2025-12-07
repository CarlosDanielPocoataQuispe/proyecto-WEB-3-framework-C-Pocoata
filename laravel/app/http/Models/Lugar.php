<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    protected $table = 'Lugares';
    
    public $timestamps = false;
    
    protected $fillable = ['nombre', 'direccion'];
}
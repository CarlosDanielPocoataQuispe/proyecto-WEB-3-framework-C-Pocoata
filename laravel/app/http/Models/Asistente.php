<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistente extends Model
{
    protected $table = 'Asistentes';
    
    // Desactivar timestamps automáticos
    public $timestamps = false;
    
    protected $fillable = ['evento_id', 'nombre', 'contacto'];
    
    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }
}
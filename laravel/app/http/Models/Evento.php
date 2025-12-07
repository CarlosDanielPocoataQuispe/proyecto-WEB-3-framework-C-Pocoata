<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'Eventos';
    
    public $timestamps = false;
    
    protected $fillable = ['nombre', 'fecha', 'lugar_id', 'organizador_id'];
    
    public function lugar()
    {
        return $this->belongsTo(Lugar::class, 'lugar_id');
    }
    
    public function rolOrganizador()
    {
        return $this->belongsTo(RolOrganizador::class, 'organizador_id');
    }
    
    public function asistentes()
    {
        return $this->hasMany(Asistente::class, 'evento_id');
    }
}
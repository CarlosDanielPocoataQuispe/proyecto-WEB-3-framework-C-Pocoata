<?php

namespace App\Models;

use CodeIgniter\Model;

class AsistenteModel extends Model
{
    protected $table = 'Asistentes';  // Tabla en plural
    protected $primaryKey = 'id';
    protected $allowedFields = ['evento_id', 'nombre', 'contacto'];
    protected $returnType = 'object';
    
    // Obtener asistentes de un evento específico
    public function obtenerPorEvento($evento_id)
    {
        return $this->where('evento_id', $evento_id)->findAll();
    }
}
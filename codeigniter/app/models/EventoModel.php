<?php

namespace App\Models;

use CodeIgniter\Model;

class EventoModel extends Model
{
    protected $table = 'Eventos';  // Nombre de tu tabla
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'fecha', 'lugar_id', 'organizador_id'];
    protected $returnType = 'object';

    // Relación con lugar
    public function obtenerEventosConLugar()
    {
        return $this->select('Eventos.*, Lugares.nombre as lugar_nombre')
        ->join('Lugares', 'Lugares.id = Eventos.lugar_id')
        ->findAll();
    }

    // Obtener evento específico con datos relacionados
    public function obtenerEventoCompleto($id)
    {
        return $this->select('Eventos.*, Lugares.nombre as lugar_nombre, Lugares.direccion, RolesOrganizador.nombre as organizador_rol')
            ->join('Lugares', 'Lugares.id = Eventos.lugar_id')
            ->join('RolesOrganizador', 'RolesOrganizador.id = Eventos.organizador_id')
            ->where('Eventos.id', $id)
            ->first();
    }
}

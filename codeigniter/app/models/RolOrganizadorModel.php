<?php

namespace App\Models;

use CodeIgniter\Model;

class RolOrganizadorModel extends Model
{
    protected $table = 'RolesOrganizador';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre'];
    protected $returnType = 'object';
}
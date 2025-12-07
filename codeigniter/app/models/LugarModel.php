<?php

namespace App\Models;

use CodeIgniter\Model;

class LugarModel extends Model
{
    protected $table = 'Lugares';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'direccion'];
    protected $returnType = 'object';
}

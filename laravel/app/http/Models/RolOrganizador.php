<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolOrganizador extends Model
{
    protected $table = 'RolesOrganizador';
    
    public $timestamps = false;
    
    protected $fillable = ['nombre'];
}
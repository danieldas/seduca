<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class AsignacionUnidad extends Model
{
    protected $table = 'AsignacionUnidad';
    protected $primaryKey = 'IdAsignacion';

    public $fillable = [
        'IdAsignacion',  
        'FkUsuario',
        'FkUnidad'        
        ];

   
}

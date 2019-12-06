<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class TipoTramite extends Model
{
   protected $table = 'TipoTramite';
    protected $primaryKey = 'IdTipoTramite';

    public $fillable = [
        'IdTipoTramite',  
        'Nombre',
        'TiempoAprox',       
        ];

}

<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Folio extends Model
{
   protected $table = 'Folio';
    protected $primaryKey = 'IdFolio';

    public $fillable = [
        'IdFolio',  
        'Observacion',
        'Estado',
        'Referencia',
        'Fecha',
        'FkSolicitante',
        'FkTipoTramite',       
        ];

}

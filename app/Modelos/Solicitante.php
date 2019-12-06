<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Solicitante extends Model
{
     protected $table = 'Solicitante';
    protected $primaryKey = 'Ci';
    public $incrementing = false;

    public $fillable = [
    	'Nombre', 'ApPaterno', 'ApMaterno', 
     'Ci', 'Telefono', 'Tipo','Sexo', 
        'Estado'
    	];


    
}

<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
   protected $table = 'Unidad';
    protected $primaryKey = 'IdUnidad';

    public $fillable = [
        'IdUnidad',  
        'Nombre',
        'Estado',       
        ];

}

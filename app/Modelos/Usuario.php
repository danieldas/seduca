<?php

namespace App\Modelos;

use Illuminate\Foundation\Auth\User;
use Hash;

class Usuario extends User
{
     protected $table = 'Usuario';
    protected $primaryKey = 'Cuenta';
    public $incrementing = false;

    public $fillable = [
    	'Nombre', 'Apellido', 
     'Cuenta', 'password', 'Rol', 'Ci', 
        'Estado'
    	];

    public function setPasswordAttribute($value)
    {
        if($value !== null)
            $this->attributes['password'] = bcrypt($value);
    }

    public function getNombreCompletoAttribute()
    {
        return $this->attributes['Nombre'] . ' ' .
            $this->attributes['Apellido'];
    }
    /*

    public function esAdministrador()
    {
        return $this->attributes['Rol'] === 'Administrador';
    }

    public function esFacilitador()
    {
        return $this->attributes['Rol'] === 'Facilitador';   
    }

    public function esResponsable()
    {
        return $this->attributes['Rol'] === 'Responsable de Municipio';   
    }
    public function esParticipante()
    {
        return $this->attributes['Rol'] === 'Participante';   
    }

    public function esFinanciador()
    {
        return $this->attributes['Rol'] === 'Financiador';   
    }

    public function esContador()
    {
        return $this->attributes['Rol'] === 'Contador';   
    }*/
    
}

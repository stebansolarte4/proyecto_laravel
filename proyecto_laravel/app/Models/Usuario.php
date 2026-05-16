<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

// app/Models/Usuario.php

class Usuario extends Authenticatable
{
    protected $table = 'usuarios'; // Asegúrate de que coincida con el nombre en tu DB
    
    // Si tu llave primaria se llama 'id_usuario' en la DB:
    protected $primaryKey = 'id_usuario'; 

    // IMPORTANTE: Si en tu tabla NO tienes 'created_at' y 'updated_at'
    public $timestamps = false; 

    protected $fillable = [
        'nombre', 
        'correo', 
        'password', 
        'fk_rol'
    ];
}

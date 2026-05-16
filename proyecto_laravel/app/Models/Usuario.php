<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Usuario extends Authenticatable
{
    // Tu tabla en la DB se llama 'usuario' en singular según tu script SQL
    protected $table = 'usuario'; 
    protected $primaryKey = 'id_usuario'; 
    public $timestamps = false; 

    protected $fillable = [
        'nombre', 
        'correo', 
        'password', 
        'fk_rol'
    ];

    /**
     * Relación con el modelo Rol
     */
    public function rol(): BelongsTo
    {
        return $this->belongsTo(Rol::class, 'fk_rol', 'id_rol');
    }

    /**
     * Indicarle a Laravel que el campo de login es 'correo'
     */
    public function getAuthIdentifierName()
    {
        return 'correo';
    }

    /**
     * Indicarle a Laravel cuál es la columna de la contraseña
     */
    public function getAuthPassword()
    {
        return $this->password;
    }
}
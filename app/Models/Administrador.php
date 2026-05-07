<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\Factories\HasFactory;


class Administrador extends Model
{
    use HasFactory;
    //1 especificamos el nombre de la tabla
    protected $table = 'administrador';
    //2 especificamos la clave primaria
    protected $primaryKey = 'id_admin';
    //3 definir campos que se pueden asignar masivamente (crud)
    protected $fillable = [
        'nombre','username','password','fk_rol'];
    
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rol extends Model
{
    use HasFactory;
    //1 especificamos el nombre de la tabla
    protected $table = 'rol';
    //2 especificamos la clave primaria
    protected $primaryKey = 'id_rol';
    //3 definir campos que se pueden asignar masivamente (crud)
    protected $fillable = ['nombre_rol'];
}

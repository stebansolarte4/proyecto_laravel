<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Libro extends Model
{
       use HasFactory;
    //1 especificamos el nombre de la tabla
    protected $table = 'libro';
    //2 especificamos la clave primaria
    protected $primaryKey = 'id_libro';
    //3 definir campos que se pueden asignar masivamente (crud)
    protected $fillable = ['titulo','fk_categoria','fk_autor', 'stock'];
    
}
    


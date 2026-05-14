<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prestamo extends Model
{
    use HasFactory;
    //1 especificamos el nombre de la tabla
    protected $table = 'prestamo';
    //2 especificamos la clave primaria
    protected $primaryKey = 'id_prestamo';
    public $incrementing = true; // Si tu clave primaria es auto-incremental
    protected $keyType = 'int'; // Tipo de la clave primaria (int, string
    //3 definir campos que se pueden asignar masivamente (crud)
    public $timestamps = false;

    protected $fillable = ['fk_usuario','fk_libro','fecha_entrega', 'fecha_devolucion','estado'];

public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'fk_usuario', 'id_usuario');
    }

    // Relación: El préstamo involucra un libro
    public function libro()
    {
        return $this->belongsTo(Libro::class, 'fk_libro', 'id_libro');
    }    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $table = 'libro'; // Nombre de tu tabla en MySQL
    protected $primaryKey = 'id_libro';
    
    // Campos que permitimos llenar
    protected $fillable = ['titulo', 'fk_categoria', 'fk_autor', 'stock'];

    // Relación: Un libro pertenece a una categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'fk_categoria', 'id_categoria');
    }

    // Relación: Un libro pertenece a un autor
    public function autor()
    {
        return $this->belongsTo(Autor::class, 'fk_autor', 'id_autor');
    }
} 


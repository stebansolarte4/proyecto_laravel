<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table = 'autor';
    protected $primaryKey = 'id_autor';
    protected $fillable = ['nombre_autor'];

    // Un autor tiene muchos libros
    public function libros()
    {
        return $this->hasMany(Libro::class, 'fk_autor', 'id_autor');
    }
}

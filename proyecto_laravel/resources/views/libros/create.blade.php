@extends('layouts.app')

@section('title', 'Agregar Libro')

@section('content')
<div class="card" style="max-width: 600px; margin: auto;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Registrar Nuevo Libro</h2>
        <a href="{{ route('libros.index') }}" style="text-decoration: none; color: #64748b;">← Volver</a>
    </div>

    <form action="{{ route('libros.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 15px;">
            <label style="display:block; margin-bottom:5px; font-weight:600;">Título del Libro</label>
            <input type="text" name="titulo" style="width:100%; padding:10px; border:1px solid #e2e8f0; border-radius:8px;" required placeholder="Ej: Cien años de soledad">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display:block; margin-bottom:5px; font-weight:600;">Autor</label>
            <select name="fk_autor" style="width:100%; padding:10px; border:1px solid #e2e8f0; border-radius:8px;" required>
                <option value="">Seleccione un autor</option>
                @foreach($autores as $autor)
                    <option value="{{ $autor->id_autor }}">{{ $autor->nombre_autor }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display:block; margin-bottom:5px; font-weight:600;">Categoría</label>
            <select name="fk_categoria" style="width:100%; padding:10px; border:1px solid #e2e8f0; border-radius:8px;" required>
                <option value="">Seleccione una categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id_categoria }}">{{ $categoria->nombre_categoria }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:5px; font-weight:600;">Stock Inicial</label>
            <input type="number" name="stock" value="1" min="1" style="width:100%; padding:10px; border:1px solid #e2e8f0; border-radius:8px;" required>
        </div>

        <button type="submit" class="btn btn-add" style="width: 100%; border: none; padding: 12px; font-size: 1rem;">Guardar en Inventario</button>
    </form>
</div>
@endsection
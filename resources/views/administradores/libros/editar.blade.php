@extends('layouts.app')

@section('title', 'Editar Libro')

@section('content')
<div class="card" style="max-width: 600px; margin: auto;">
    <h2>Editar Libro: {{ $libro->titulo }}</h2>
    
    <form action="{{ route('libros.update', $libro->id_libro) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label style="display:block; margin-bottom:5px; font-weight:600;">Título</label>
            <input type="text" name="titulo" value="{{ $libro->titulo }}" style="width:100%; padding:10px; border:1px solid #e2e8f0; border-radius:8px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display:block; margin-bottom:5px; font-weight:600;">Autor</label>
            <select name="fk_autor" style="width:100%; padding:10px; border:1px solid #e2e8f0; border-radius:8px;">
                @foreach($autores as $autor)
                    <option value="{{ $autor->id_autor }}" {{ $libro->fk_autor == $autor->id_autor ? 'selected' : '' }}>
                        {{ $autor->nombre_autor }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:5px; font-weight:600;">Stock Disponible</label>
            <input type="number" name="stock" value="{{ $libro->stock }}" style="width:100%; padding:10px; border:1px solid #e2e8f0; border-radius:8px;">
        </div>

        <button type="submit" class="btn" style="background: #fbbf24; color: black; width: 100%; border: none; padding: 12px;">Actualizar Libro</button>
        <button type="submit" style="background:none; border:none; cursor:pointer;" onclick="return confirm('¿Salir?')">❌</button>
    </form>
</div>
@endsection
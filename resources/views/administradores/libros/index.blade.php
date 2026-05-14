@extends('layouts.app')

@section('title', 'Inventario de Libros')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
    <h1>Inventario de Libros</h1>
    <a href="{{ route('libros.create') }}" class="btn btn-add">+ Agregar Nuevo Libro</a>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Categoría</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($libros as $libro)
            <tr>
                <td><strong>{{ $libro->titulo }}</strong></td>
                <td>{{ $libro->autor->nombre_autor ?? 'N/A' }}</td>
                <td>{{ $libro->categoria->nombre_categoria ?? 'N/A' }}</td>
                <td>{{ $libro->stock }}</td>
                <td>
                    @if(auth()->user()->fk_rol == 1) 
                    <a href="{{ route('libros.edit', $libro->id_libro) }}">✏️</a>
                    <a href="{{ route('libros.edit', $libro->id_libro) }}" title="Editar">✏️</a>
                    <form action="{{ route('libros.destroy', $libro->id_libro) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" style="background:none; border:none; cursor:pointer;" onclick="return confirm('¿Eliminar libro?')">🗑️</button>
                    @if (session('error'))
                     <div style="background-color: #fee2e2; color: #b91c1c; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                      {{ session('error') }}
                     </div>
                    @endif

                     @if (session('success'))
                     <div style="background-color: #dcfce7; color: #15803d; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                     {{ session('success') }}
                     </div>
                    @endif

                    <button type="submit" style="background:none; border:none; cursor:pointer;" onclick="return confirm('¿Salir?')">❌</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
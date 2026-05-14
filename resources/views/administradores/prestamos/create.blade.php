@extends('layouts.app')

@section('title', 'Nuevo Préstamo')

@section('content')
<div class="card" style="max-width: 600px; margin: auto;">
    <h2>Asignar Préstamo de Libro</h2>
    
    <form action="{{ route('prestamos.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 15px;">
            <label>Seleccionar Usuario (Estudiante/Profesor):</label>
            <select name="fk_usuario" class="form-control" style="width:100%; padding:10px;" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id_usuario }}">{{ $usuario->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Libro a Prestar:</label>
            <select name="fk_libro" class="form-control" style="width:100%; padding:10px;" required>
                @foreach($libros as $libro)
                    <option value="{{ $libro->id_libro }}">{{ $libro->titulo }} (Stock: {{ $libro->stock }})</option>
                @endforeach
            </select>
        </div>

        <div style="display: flex; gap: 10px; margin-bottom: 20px;">
            <div style="flex: 1;">
                <label>Fecha de Entrega:</label>
                <input type="date" name="fecha_entrega" value="{{ date('Y-m-d') }}" style="width:100%; padding:10px;" required>
            </div>
            <div style="flex: 1;">
                <label>Fecha de Devolución:</label>
                <input type="date" name="fecha_devolucion" style="width:100%; padding:10px;" required>
            </div>
        </div>

        <button type="submit" class="btn btn-add" style="width: 100%; border:none; padding: 12px;">Finalizar Préstamo</button>
    </form>
</div>
@endsection
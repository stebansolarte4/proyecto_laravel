@extends('layouts.app')


@section('content')
<div class="container" style="padding: 20px;">

 
@section('content')
<div class="container" style="padding: 20px;">
 

    {{-- Encabezado --}}
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="font-weight: 700; color: #1e293b;">Catálogo de Libros</h2>
        @if(auth()->user()->fk_rol == 1)
            <a href="{{ route('libros.create') }}" style="background: #2563eb; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 600;">
                + Agregar Libro
            </a>
        @endif
    </div>



 

    {{-- Buscador o Filtros (Opcional pero recomendado) --}}
    <div style="margin-bottom: 25px;">
        <input type="text" placeholder="Buscar por título o autor..." style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #cbd5e1; outline: none;">
    </div>


 

    {{-- Tabla de Libros --}}
    <div class="card" style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="text-align: left; border-bottom: 2px solid #f1f5f9;">
                    <th style="padding: 12px;">Título</th>
                    <th style="padding: 12px;">Categoría</th>
                    <th style="padding: 12px;">Autor</th>
                    <th style="padding: 12px;">Stock</th>
                    @if(auth()->user()->fk_rol == 1)
                        <th style="padding: 12px;">Acciones</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($libros as $libro)
                <tr style="border-bottom: 1px solid #f1f5f9;">
                    <td style="padding: 12px;">
                        <div style="display: flex; align-items: center;">
                            <span style="font-size: 1.2rem; margin-right: 10px;">📘</span>
                            <strong>{{ $libro->titulo }}</strong>
                        </div>
                    </td>
                    <td style="padding: 12px;">
                        <span style="background: #e2e8f0; padding: 4px 10px; border-radius: 6px; font-size: 0.85rem;">
                            {{ $libro->categoria->nombre_categoria ?? 'Sin categoría' }}
                        </span>
                    </td>
                    <td style="padding: 12px;">{{ $libro->autor->nombre_autor ?? 'Desconocido' }}</td>
                    <td style="padding: 12px;">
                        @if($libro->stock > 0)
                            <span style="color: #10b981; font-weight: 600;">{{ $libro->stock }} disponibles</span>
                        @else
                            <span style="color: #ef4444; font-weight: 600;">Agotado</span>
                        @endif
                    </td>
                    @if(auth()->user()->fk_rol == 1)
                        <td style="padding: 12px;">
                            <a href="{{ route('libros.edit', $libro->id_libro) }}" style="color: #2563eb; margin-right: 10px;">Editar</a>
                            {{-- Aquí podrías poner un botón de eliminar si lo necesitas --}}
                        </td>
                    @endif
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; padding: 40px; color: #94a3b8;">
                        No hay libros registrados en la base de datos.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
 
</div>
@endsection
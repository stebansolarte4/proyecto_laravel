@extends('layouts.app')


@section('content')
<div class="container" style="padding: 20px;">


    {{-- Encabezado --}}
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="font-weight: 700; color: #1e293b;">Catálogo de Libros</h2>
         @if(auth()->check() && auth()->user()->fk_rol == 1)
            <a href="{{ route('libros.create') }}" style="background: #2563eb; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 600;">
                + Agregar Libro
            </a>
        @endif
    </div>

   {{-- Buscador con Botón --}}
<div style="margin-bottom: 25px;">
    <form action="{{ route('libros.index') }}" method="POST" style="display: flex; gap: 10px;">
        <input type="text" 
               name="search" 
               value="{{ request('search') }}" 
               placeholder="Buscar por título o autor..." 
               style="flex: 1; padding: 12px; border-radius: 8px; border: 1px solid #cbd5e1; outline: none; font-size: 1rem;">
        
        <button type="submit" style="background: #2563eb; color: white; padding: 10px 20px; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 5px;">
            🔍 Buscar
        </button>
        
        @if(request('search'))
            <a href="{{ route('libros.index') }}" style="background: #64748b; color: white; padding: 10px 15px; border-radius: 8px; text-decoration: none; display: flex; align-items: center;">
                Limpiar
            </a>
        @endif
    </form>
</div>

    {{-- Contenedor de Tarjetas (Grid) --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
        @forelse($libros as $libro)
            <div class="card" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border: 1px solid #e2e8f0;">
                <div style="background: #2563eb; height: 120px; display: flex; align-items: center; justify-content: center;">
                    <span style="font-size: 3rem; color: white;">📖</span>
                </div>
                
                <div style="padding: 20px;">
                    <h3 style="margin: 0 0 5px 0; font-size: 1.2rem; color: #1e293b;">{{ $libro->titulo }}</h3>
                    <p style="margin: 0; color: #64748b; font-size: 0.9rem;">{{ $libro->autor->nombre_autor ?? 'Autor desconocido' }}</p>
                    
                    <span style="display: inline-block; background: #e2e8f0; padding: 4px 10px; border-radius: 6px; font-size: 0.8rem; margin: 10px 0;">
                        {{ $libro->categoria->nombre_categoria ?? 'General' }}
                    </span>

                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 15px;">
                        @php
                            $color = $libro->stock > 0 ? '#10b981' : '#ef4444';
                        @endphp
                        <span style="font-size: 0.9rem; font-weight: 600; color: {{ $color }};">
                            {{ $libro->stock > 0 ? '✅ Disponible' : '🛑 Agotado' }}
                        </span>
                        <span style="color: #64748b; font-size: 0.9rem;">Copias: {{ $libro->stock }}</span>
                    </div>

                    {{-- Botón de Acción --}}
                    @if($libro->stock > 0)
                        <form action="{{ route('prestamos.store') }}" method="POST" style="margin-top: 15px;">
                            @csrf
                            <input type="hidden" name="fk_libro" value="{{ $libro->id_libro }}">
                            <input type="hidden" name="fk_libro" value="{{ $libro->id_libro }}">
                            <input type="hidden" name="fk_usuario" value="{{ auth()->id() }}"> {{-- Cambiamos a auth()->id() para mayor seguridad --}}
                            <input type="hidden" name="fecha_entrega" value="{{ date('Y-m-d') }}">
                            <input type="hidden" name="fecha_devolucion" value="{{ date('Y-m-d', strtotime('+7 days')) }}">
                            <input type="hidden" name="estado" value="activo">

                          <button type="submit" style="width: 100%; background: #10b981; color: white; border: none; padding: 12px; border-radius: 8px; font-weight: 600; cursor: pointer; display: block;">
                           Solicitar Préstamo
                           </button>
                        </form>
                    @else
                        <button disabled style="width: 100%; background: #cbd5e1; color: #64748b; border: none; padding: 10px; border-radius: 8px; margin-top: 15px; cursor: not-allowed;">
                            No Disponible
                        </button>
                    @endif
                </div>
            </div>
        @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: #94a3b8;">
                No hay libros registrados en la base de datos.
            </div>
        @endforelse
    </div>

</div>
@endsection

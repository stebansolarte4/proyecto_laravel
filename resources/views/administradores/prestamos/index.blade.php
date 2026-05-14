@extends('layouts.app')
 
@section('content')
<div class="container" style="padding: 20px;">
<<<<<<< HEAD
   
=======
    
>>>>>>> 545b4a53afbec8cff496db263b129d6f8bc3eb6e
    {{-- Encabezado --}}
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="font-weight: 700; color: #1e293b;">Mis Préstamos</h2>
        <span style="color: #64748b;">{{ $prestamos->count() }} registros encontrados</span>
    </div>
<<<<<<< HEAD
 
=======

>>>>>>> 545b4a53afbec8cff496db263b129d6f8bc3eb6e
    {{-- Tarjetas de Resumen (Stats) --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px;">
        <div style="background: #2563eb; color: white; padding: 25px; border-radius: 12px;">
            <div style="font-size: 1.2rem; margin-bottom: 5px;">🕒</div>
            <h3 style="margin: 0; font-size: 2rem;">{{ $prestamos->where('estado', 'activo')->count() }}</h3>
            <p style="margin: 0; opacity: 0.9;">Préstamos Activos</p>
        </div>
 
        <div style="background: #ef4444; color: white; padding: 25px; border-radius: 12px;">
            <div style="font-size: 1.2rem; margin-bottom: 5px;">⚠️</div>
            <h3 style="margin: 0; font-size: 2rem;">{{ $prestamos->where('estado', 'mora')->count() }}</h3>
            <p style="margin: 0; opacity: 0.9;">Préstamos Vencidos</p>
        </div>
 
        <div style="background: #10b981; color: white; padding: 25px; border-radius: 12px;">
            <div style="font-size: 1.2rem; margin-bottom: 5px;">✅</div>
            <h3 style="margin: 0; font-size: 2rem;">{{ $prestamos->where('estado', 'devuelto')->count() }}</h3>
            <p style="margin: 0; opacity: 0.9;">Libros Devueltos</p>
        </div>
    </div>
<<<<<<< HEAD
 
    {{-- Tabla de Detalles --}}
    <div class="card" style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
        <h3 style="font-size: 1.1rem; color: #1e293b; margin-bottom: 20px;">Listado Detallado</h3>
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="text-align: left; border-bottom: 2px solid #f1f5f9;">
                    <th style="padding: 12px;">Libro solicitado</th>
                    @if(auth()->user()->fk_rol == 1)
                        <th style="padding: 12px;">Usuario</th>
                    @endif
                    <th style="padding: 12px;">Fecha de Salida</th>
                    <th style="padding: 12px;">Fecha de Devolución</th>
                    <th style="padding: 12px;">Estado</th>
                </tr>
            </thead>
            <tbody>
                @forelse($prestamos as $prestamo)
                <tr style="border-bottom: 1px solid #f1f5f9;">
                    <td style="padding: 12px;">
                        <div style="display: flex; align-items: center;">
                            <span style="font-size: 1.5rem; margin-right: 10px;">📖</span>
                            <div>
                                <strong>{{ $prestamo->libro->titulo }}</strong><br>
                                <small style="color: #64748b;">{{ $prestamo->libro->autor->nombre_autor ?? 'Autor desconocido' }}</small>
                            </div>
                        </div>
                    </td>
                   
                    @if(auth()->user()->fk_rol == 1)
                        <td style="padding: 12px;">{{ $prestamo->usuario->nombre ?? 'N/A' }}</td>
                    @endif
 
                    <td style="padding: 12px;">{{ $prestamo->fecha_entrega ? date('d/m/Y', strtotime($prestamo->fecha_entrega)) : 'N/A' }}</td>
                    <td style="padding: 12px;">{{ date('d/m/Y', strtotime($prestamo->fecha_devolucion)) }}</td>
                   
                    <td style="padding: 12px;">
                        @if($prestamo->estado == 'activo')
                            <span style="background: #fef3c7; color: #92400e; padding: 5px 12px; border-radius: 15px; font-size: 0.8rem; font-weight: 600;">
                                ⏳ En posesión
                            </span>
                        @elseif($prestamo->estado == 'mora')
                             <span style="background: #fee2e2; color: #b91c1c; padding: 5px 12px; border-radius: 15px; font-size: 0.8rem; font-weight: 600;">
                                🛑 En mora
                            </span>
                        @else
                            <span style="background: #dcfce7; color: #166534; padding: 5px 12px; border-radius: 15px; font-size: 0.8rem; font-weight: 600;">
                                ✅ Devuelto
                            </span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="{{ auth()->user()->fk_rol == 1 ? 5 : 4 }}" style="text-align: center; padding: 40px; color: #94a3b8;">
                        No hay registros de préstamos.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
 
</div>
@endsection
 
=======

    {{-- Tabla de Detalles --}}
    <div class="card" style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
        <h3 style="font-size: 1.1rem; color: #1e293b; margin-bottom: 20px;">Listado Detallado</h3>
        <div style="display: grid; gap: 15px;">
            @forelse($prestamos as $prestamo)
            <div style="background: white; border-radius: 12px; padding: 20px; margin-bottom: 15px; border-left: 5px solid {{ $prestamo->estado == 'mora' ? '#ef4444' : '#2563eb' }}; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                <div style="display: flex; align-items: center; gap: 15px;">
                    <span style="font-size: 2rem;">📘</span>
                    <div>
                        <h4 style="margin: 0; font-size: 1.1rem;">{{ $prestamo->libro->titulo }}</h4>
                        <small style="color: #64748b;">{{ $prestamo->libro->autor->nombre_autor }}</small>
                        <div style="margin-top: 5px; font-size: 0.85rem;">
                            <span>📅 Salida: {{ date('d/m/Y', strtotime($prestamo->fecha_entrega)) }}</span> |
                            <span style="color: #ef4444;">⌛ Devolución: {{ date('d/m/Y', strtotime($prestamo->fecha_devolucion)) }}</span>
                        </div>
                    </div>
                </div>

                <div>
                    @if($prestamo->estado == 'activo')
                    <form action="{{ route('prestamos.update', $prestamo->id_prestamo) }}" method="POST">
                    @csrf
                    @method('PATCH')
                        <button style="background: #10b981; color: white; border: none; padding: 8px 15px; border-radius: 6px; font-weight: 600; cursor: pointer;">
                            Marcar como Devuelto
                        </button>
                        </form>
                    @else
                        <span style="color: #64748b; font-weight: 600;">{{ ucfirst($prestamo->estado) }}</span>
                    @endif
                </div>
            </div>
            @empty
            <div style="text-align: center; padding: 40px; color: #94a3b8;">
                No hay registros de préstamos.
            </div>
            @endforelse
        </div>
    </div>

</div>
@endsection
>>>>>>> 545b4a53afbec8cff496db263b129d6f8bc3eb6e

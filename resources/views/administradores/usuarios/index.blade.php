@extends('layouts.app')

@section('title', 'Gestión de Usuarios')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
    <h1>Usuarios del Sistema</h1>
    <a href="{{ route('usuarios.create') }}" class="btn btn-add">+ Nuevo Usuario</a>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td><strong>{{ $usuario->nombre }}</strong></td>
                <td>{{ $usuario->correo }}</td>
                <td>
                    <span style="background-color: {{ $usuario->fk_rol == 1 ? '#dbeafe' : '#f1f5f9' }}; color: {{ $usuario->fk_rol == 1 ? '#1e40af' : '#475569' }}; padding: 5px 10px; border-radius: 10px;">
                 {{ $usuario->fk_rol == 1 ? 'Administrador' : ($usuario->fk_rol == 2 ? 'Estudiante' : 'Profesor') }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('usuarios.edit', $usuario->id_usuario) }}" style="text-decoration:none; margin-right:10px;">✏️</a>
                    <form action="{{ route('usuarios.destroy', $usuario->id_usuario) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" style="background:none; border:none; cursor:pointer;" onclick="return confirm('¿Eliminar este usuario?')">🗑️</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Usuarios del Sistema')

@section('content')

<style>
    body{
        background: linear-gradient(135deg, #4b2e05, #8b5e34, #d4a373);
        min-height: 100vh;
        font-family: 'Segoe UI', sans-serif;
    }

    .usuarios-container{
        padding: 40px 20px;
    }

    .usuarios-card{
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }

    .header-usuarios{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .header-usuarios h1{
        color: #5c3b1e;
        margin: 0;
        font-weight: bold;
    }

    .btn-add{
        background: #5c3b1e;
        color: white;
        padding: 12px 18px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: bold;
        transition: 0.3s;
    }

    .btn-add:hover{
        background: #3e2612;
        transform: scale(1.03);
    }

    table{
        width: 100%;
        border-collapse: collapse;
        overflow: hidden;
        border-radius: 15px;
    }

    thead{
        background: #5c3b1e;
        color: white;
    }

    thead th{
        padding: 15px;
        text-align: left;
    }

    tbody tr{
        background: #fffaf5;
        transition: 0.3s;
    }

    tbody tr:nth-child(even){
        background: #f7ede2;
    }

    tbody tr:hover{
        background: #ede0d4;
    }

    tbody td{
        padding: 15px;
        border-bottom: 1px solid #e7d3c1;
    }

    .role-label{
        padding: 7px 14px;
        border-radius: 20px;
        display: inline-block;
        font-size: 14px;
        font-weight: bold;
    }

    .role-admin{
        background: #dbeafe;
        color: #1e40af;
    }

    .role-bibliotecario{
        background: #ede9fe;
        color: #6d28d9;
    }

    .role-estudiante{
        background: #dcfce7;
        color: #166534;
    }

    .role-profesor{
        background: #fef3c7;
        color: #92400e;
    }

    .acciones{
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .btn-icon{
        text-decoration: none;
        font-size: 18px;
        transition: 0.3s;
    }

    .btn-icon:hover{
        transform: scale(1.2);
    }

    .btn-delete{
        background: none;
        border: none;
        cursor: pointer;
        font-size: 18px;
    }

    .alert-success {
        background: #dcfce7;
        color: #14532d;
        border: 1px solid #bbf7d0;
        padding: 15px;
        border-radius: 12px;
        margin-bottom: 20px;
        font-weight: 600;
    }
</style>

<div class="usuarios-container">

    <div class="usuarios-card">

        <div class="header-usuarios">
            <h1>📚 Usuarios del Sistema</h1>
            
            {{-- Un solo botón de agregar, limpio y elegante --}}
            <a href="{{ route('usuarios.create') }}" class="btn-add">
                + Nuevo Usuario
            </a>
        </div>

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
                    <td>
                        <strong>{{ $usuario->nombre }}</strong>
                    </td>

                    <td>
                        {{ $usuario->correo }}
                    </td>

                    <td>
                        @php
                            // Mapeo corregido según los IDs de tu DB (1=Biblio, 2=Profe, 3=Estudiante, 4=Admin)
                            $classes = [
                                1 => 'role-Administrador',
                                2 => 'role-Bibliotecario',
                                3 => 'role-Profesor',
                                4 => 'role-estudiante'
                            ];
                            $class = $classes[$usuario->fk_rol] ?? 'role-estudiante';
                        @endphp

                        <span class="role-label {{ $class }}">
                            {{ $usuario->rol->nombre_rol ?? 'Sin Rol' }}
                        </span>
                    </td>

                    <td>
                        <div class="acciones">
                            {{-- Botón de Editar --}}
                            <a href="{{ route('usuarios.edit', $usuario->id_usuario) }}" class="btn-icon">
                                ✏️
                            </a>

                            {{-- Formulario de Eliminar bien cerrado --}}
                            <form action="{{ route('usuarios.destroy', $usuario->id_usuario) }}" method="POST" style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                
                                <button 
                                    type="submit"
                                    class="btn-delete"
                                    onclick="return confirm('¿De verdad queeres eliminar este usuario?')"
                                >
                                    🗑️
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
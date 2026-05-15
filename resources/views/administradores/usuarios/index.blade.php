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

</style>

<div class="usuarios-container">

    <div class="usuarios-card">

        <div class="header-usuarios">

            <h1>📚 Usuarios del Sistema</h1>

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

                            if($usuario->fk_rol == 1){
                                $roleClass = 'role-admin';
                                $roleText = 'Administrador';
                            }
                            elseif($usuario->fk_rol == 2){
                                $roleClass = 'role-estudiante';
                                $roleText = 'Estudiante';
                            }
                            elseif($usuario->fk_rol == 3){
                                $roleClass = 'role-profesor';
                                $roleText = 'Profesor';
                            }
                            else{
                                $roleClass = 'role-bibliotecario';
                                $roleText = 'Bibliotecario';
                            }

                        @endphp

                        <span class="role-label {{ $roleClass }}">
                            {{ $roleText }}
                        </span>

                    </td>

                    <td>

                        <div class="acciones">

                            <a 
                                href="{{ route('usuarios.edit', $usuario->id_usuario) }}"
                                class="btn-icon"
                            >
                                ✏️
                            </a>

                            <form 
                                action="{{ route('usuarios.destroy', $usuario->id_usuario) }}"
                                method="POST"
                            >

                                @csrf
                                @method('DELETE')

                                <button 
                                    type="submit"
                                    class="btn-delete"
                                    onclick="return confirm('¿Eliminar este usuario?')"
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
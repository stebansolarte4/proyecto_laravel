<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Administradores</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
 
    <div class="container my-5">
        <h1 class="mb-4">Administradores Registrados</h1>
        
        <a href="{{ route('administradores.create') }}" class="btn btn-primary mb-3">
            Crear Nuevo Administrador
        </a>
        
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
 
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Ciudad</th>
                        <th>Email</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($administradores as $administrador)
                    <tr>
                        <td>{{ $administrador->id_administrador }}</td>
                        <td>{{ $administrador->nombre }}</td>
                        <td>{{ $administrador->apellido }}</td>
                        <td>{{ $administrador->ciudad }}</td>
                        <td>{{ $administrador->email }}</td>
                        <td class="text-center">
                            <a href="{{ route('administradores.edit', $administrador->id_administrador) }}" class="btn btn-sm btn-warning me-2">
                                Editar
                            </a>
                            
                            <form action="{{ route('administradores.destroy', $administrador->id_administrador) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro de que desea ELIMINAR al administrador {{ $administrador->nombre }} {{ $administrador->apellido }}?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>
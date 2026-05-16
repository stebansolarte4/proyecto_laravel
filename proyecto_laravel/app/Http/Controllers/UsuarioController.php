<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Rol;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    //permiso de acceso a esta sección solo para administradores
    if (Auth::user()->fk_rol != 1 && Auth::user()->fk_rol != 2) {
        return redirect('/libros')->with('error', 'No tenés permisos para administrar usuarios.');
    }

    $usuarios = Usuario::with('rol')->get();
    return view('administradores.usuarios.index', compact('usuarios'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->fk_rol != 1 && Auth::user()->fk_rol != 2) {
        return redirect('/libros')->with('error', 'No tenés permisos para administrar usuarios.');
    }

        $roles = Rol::all();
        return view('administradores.usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    if (Auth::user()->fk_rol != 1 && Auth::user()->fk_rol != 2) {
        return redirect('/libros')->with('error', 'No tenés permisos para administrar usuarios.');
    }

    try {
        // Quitamos la validación un segundo para ver si el fallo es de base de datos
        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'password' => bcrypt($request->password),
            'fk_rol' => $request->fk_rol,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado con éxito');

    } catch (\Exception $e) {
        // Si hay un error de SQL o lo que sea, te lo va a estampar en la pantalla
        dd($e->getMessage());
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::user()->fk_rol != 1 && Auth::user()->fk_rol != 2) {
        return redirect('/libros')->with('error', 'No tenés permisos para administrar usuarios.');
    }

        $usuario = Usuario::findOrFail($id);
        $roles = Rol::all();
        return view('administradores.usuarios.edit', compact('usuario', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    if (Auth::user()->fk_rol != 1 && Auth::user()->fk_rol != 2) {
        return redirect('/libros')->with('error', 'No tenés permisos para administrar usuarios.');
    }
    
    $usuario = Usuario::findOrFail($id);

    $request->validate([
        'nombre' => 'required|max:255',
        'correo' => 'required|email|unique:usuario,correo,' . $id . ',id_usuario', // Evita error de duplicado al editar
        'fk_rol' => 'required|exists:rol,id_rol',
    ]);
    
    try {

    $data = [
        'nombre' => $request->nombre,
        'correo' => $request->correo,
        'fk_rol' => $request->fk_rol
    ];

    // Solo actualiza la contraseña si el usuario escribió una nueva
    if ($request->filled('password')) {
        $request->validate(['password' => 'min:6']);
        $data['password'] = bcrypt($request->password);
    }

    $usuario->update($data);

    return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente');
    } catch (\Exception $e) {
        dd($e->getMessage());
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Auth::user()->fk_rol != 1 && Auth::user()->fk_rol != 2) {
            return redirect('/libros')->with('error', 'No tenés permisos para administrar usuarios.');
        }

        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente');
    }
}

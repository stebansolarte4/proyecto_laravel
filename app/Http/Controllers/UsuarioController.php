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
    /*if (Auth::user()->fk_rol != 1) {
            return redirect()->route('libros.index')->with('error', 'No tienes permiso para ver esta sección.');
        }*/
<<<<<<< HEAD
=======

>>>>>>> c5374868bd29048f2d4e2c6316e559178634a5d5
        $usuarios = Usuario::with('rol')->get();
        return view('administradores.usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Rol::all();
        return view('administradores.usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|max:255',
        'correo' => 'required|correo|unique:usuario,correo', // Usando 'usuario' en singular si es necesario
        'password' => 'required|min:8',
    ]);

    Usuario::create([
        'nombre' => $request->nombre,
        'correo' => $request->correo,
        'password' => bcrypt($request->password),
    ]);

    return redirect()->route('usuarios.index')->with('success', 'Usuario creado con éxito');
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
        $usuario = Usuario::findOrFail($id);
        $roles = Rol::all();
        return view('administradores.usuarios.edit', compact('usuario', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'password' => bcrypt($request->password),
            'fk_rol' => $request->fk_rol
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente');
    }
}

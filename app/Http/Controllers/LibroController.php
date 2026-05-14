<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Categoria;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::with(['autor', 'categoria'])->get();
        return view('administradores.libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $autores = Autor::all();
        $categorias = Categoria::all();
        return view('admin.libros.create', compact('autores', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'fk_autor' => 'required',
            'fk_categoria' => 'required',
            'stock' => 'required|integer'
        ]);
if (Auth::user()->fk_rol != 1) {
        return redirect()->route('libros.index')->with('error', 'No tienes permisos para agregar libros.');
    }

    // 2. Validamos los datos
    $request->validate([
        'titulo' => 'required|max:255',
        'fk_autor' => 'required',
        'fk_categoria' => 'required',
        'stock' => 'required|integer|min:0',
    ]);

    // 3. Guardamos
    Libro::create($request->all());

    return redirect()->route('libros.index')->with('success', 'Libro creado exitosamente');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $libro = Libro::findOrFail($id);
        return view('admin.libros.show', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $libro = Libro::findOrFail($id);
        $autores = Autor::all();
        $categorias = Categoria::all();
        return view('admin.libros.edit', compact('libro', 'autores', 'categorias'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo' => 'required',
            'fk_autor' => 'required',
            'fk_categoria' => 'required',
            'stock' => 'required|integer'
        ]);

        $libro = Libro::findOrFail($id);
        $libro->update($request->all());
        return redirect()->route('libros.index')->with('success', 'Libro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
public function destroy($id)
{
    // Verificamos primero si el usuario existe y luego si es Admin (Rol 1)
    if (Auth::check() && Auth::user()->fk_rol == 1) {
        $libro = Libro::findOrFail($id);
        $libro->delete();
        
        return redirect()->route('libros.index')->with('success', 'Libro eliminado exitosamente.');
    }

    // Si llega aquí, es porque no es admin o no está logueado
    return redirect()->route('libros.index')->with('error', 'Acceso denegado: Solo el Administrador puede eliminar libros.');
}
}

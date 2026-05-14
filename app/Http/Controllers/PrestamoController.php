<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Prestamo;
use App\Models\Libro;
use App\Models\Usuario;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $user = Auth::user();

    if ($user->fk_rol == 1) {
        // El Administrador ve todos los préstamos de la biblioteca
        $prestamos = Prestamo::with(['libro', 'usuario'])->get();
    } else {
        // Estudiantes (2) y Profesores (3) solo ven sus propios préstamos
        $prestamos = Prestamo::with(['libro'])
            ->where('fk_usuario', $user->id_usuario)
            ->get();
    }

    return view('administradores.prestamos.index', compact('prestamos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
   if (Auth::user()->fk_rol != 1) {
            return redirect()->route('prestamos.index')->with('error', 'No tienes permiso.');
        }

        $libros = Libro::where('stock', '>', 0)->get(); // Solo libros disponibles
        $usuarios = Usuario::all();
        return view('admin.prestamos.create', compact('libros', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'fk_usuario' => 'required',
            'fk_libro' => 'required',
            'fecha_entrega' => 'required|date',
            'fecha_devolucion' => 'required|date|after:fecha_entrega',
        ]);

        // Crear préstamo y bajar stock
        Prestamo::create($request->all());
        Libro::find($request->fk_libro)->decrement('stock');

        return redirect()->route('prestamos.index')->with('success', 'Préstamo registrado correctamente.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

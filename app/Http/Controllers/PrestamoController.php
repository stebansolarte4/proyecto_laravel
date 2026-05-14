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
            ->where('fk_usuario', Auth::user()->id_usuario)
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
        return view('administradores.prestamos.create', compact('libros', 'usuarios'));
    }
public function store(Request $request)
{
    // Esto obligará a la página a detenerse y mostrar los datos. 
    // Si al dar clic NO ves una pantalla negra con datos, el problema es 100% tu HTML/Botón.
    // dd($request->all()); 

    $prestamo = new \App\Models\Prestamo();
    $prestamo->fk_usuario = Auth::user()->id_usuario;
    $prestamo->fk_libro = $request->fk_libro;
    $prestamo->fecha_entrega = date('Y-m-d');
    $prestamo->fecha_devolucion = date('Y-m-d', strtotime('+7 days'));
    $prestamo->estado = 'activo';
    $prestamo->save();

    // Restar stock
    \App\Models\Libro::where('id_libro', $request->fk_libro)->decrement('stock');

    return redirect()->route('prestamos.index')->with('success', '¡Logrado!');
}
    /**
     * Store a newly created resource in storage.
     */
   /* public function store(Request $request)
{
    // 1. Validar que el libro exista y tenga stock
    $libro = Libro::findOrFail($request->fk_libro);

    if ($libro->stock <= 0) {
        return back()->with('error', 'El libro no tiene Stock disponibles.');
    }

    // 2. Validar los datos (Asegúrate que coincidan con los nombres de tu tabla)
    $request->validate([
        'fk_usuario' => 'required',
        'fk_libro' => 'required',
        'fecha_entrega' => 'required|date',
        'fecha_devolucion' => 'required|date|after:fecha_entrega',
        'estado' => 'required|in:activo,devuelto',
    ]);
    $nuevoPrestamo = new Prestamo();
    $nuevoPrestamo->fk_usuario = Auth::user()->id_usuario;
    $nuevoPrestamo->fk_libro = $request->fk_libro;
    $nuevoPrestamo->fecha_entrega = now()->format('Y-m-d');
    $nuevoPrestamo->fecha_devolucion = now()->addDays(7)->format('Y-m-d');
    $nuevoPrestamo->estado = 'activo';
    $nuevoPrestamo->save();

    // 3. Crear el préstamo usando todos los datos del formulario
    Prestamo::create($request->all());

    // 4. MERMAR EL STOCK (Aquí es donde se resta)
    $libro->decrement('stock');

    return redirect()->route('prestamos.index')->with('success', '¡Préstamo registrado con éxito!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prestamo = Prestamo::findOrFail($id);
        return view('admin.prestamos.show', compact('prestamo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prestamo = Prestamo::findOrFail($id);
        return view('admin.prestamos.edit', compact('prestamo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $prestamo = Prestamo::findOrFail($id);
        if ($prestamo->estado != 'devuelto') {
        $prestamo->update(['estado' => 'devuelto']);

        $libro = Libro::find($prestamo->fk_libro);
        $libro->increment('stock');

        return redirect()->back()->with('success', 'Libro devuelto correctamente.');
    }

    return redirect()->back()->with('error', 'Este libro ya fue devuelto.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       //
    }
}

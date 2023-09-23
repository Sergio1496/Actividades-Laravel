<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Libro;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::all();
        return view('prestamos.index', compact('prestamos'));
    }

    public function create()
    {
        $librosDisponibles = Libro::where('disponible', true)->get();
        return view('prestamos.create', compact('librosDisponibles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'required|date',
        ]);
    
        $book = Libro::find($request->book_id);
    
        if (!$book) {
            return redirect()->route('prestamos.create')->with('error', 'El libro no existe.');
        }
    
        if (!$book->disponible) {
            return redirect()->route('prestamos.create')->with('error', 'El libro no está disponible.');
        }
    
        $user = auth()->user();
    
        $prestamo = new Prestamo([
            'book_id' => $request->book_id,
            'user_id' => $user->id, 
            'fecha_prestamo' => $request->fecha_prestamo,
            'fecha_devolucion' => $request->fecha_devolucion,
            'devuelto' => false,
        ]);
    
        $prestamo->save();
    
        $book->disponible = false;
        $book->save();
    
        return redirect()->route('prestamos.index')->with('success', 'Préstamo creado exitosamente.');
    }
    public function show($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        return view('prestamos.show', compact('prestamo'));
    }

    public function edit($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        return view('prestamos.edit', compact('prestamo'));
    }

    public function update(Request $request, $id)
    {
        
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->update($request->all());
        return redirect()->route('prestamos.index')->with('success', 'Préstamo actualizado exitosamente.');
    }

    public function destroy($id)
    {
        
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->delete();
        return redirect()->route('prestamos.index')->with('success', 'Préstamo eliminado exitosamente.');
    }

    public function finalizar($id)
    {
        $prestamo = Prestamo::findOrFail($id);

        if (!$prestamo->devuelto) {
            $prestamo->devuelto = true;
            $prestamo->save();

            // Actualizar el estado del libro a disponible
            $libro = Libro::find($prestamo->book_id);
            if ($libro) {
                $libro->disponible = true;
                $libro->save();
            }

            return redirect()->route('prestamos.index')->with('success', 'Préstamo finalizado exitosamente.');
        } else {
            return redirect()->route('prestamos.index')->with('error', 'Este préstamo ya ha sido devuelto previamente.');
        }
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::all();
        return view('libros.index', compact('libros'));
    }

    public function create()
    {
        return view('libros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'año_publicacion' => 'required|integer',
            'género' => 'required',
            'disponible' => 'boolean',
        ]);

        $libro = new Libro([
            'titulo' => $request->input('titulo'),
            'autor' => $request->input('autor'),
            'año_publicacion' => $request->input('año_publicacion'),
            'género' => $request->input('género'),
            'disponible' => $request->input('disponible', false), // Por defecto, no disponible
        ]);

        $libro->save();

        return redirect()->route('libros.index')->with('success', 'Libro creado exitosamente.');
    }

    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        return view('libros.show', compact('libro'));
    }

    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        return view('libros.edit', compact('libro'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'año_publicacion' => 'required|integer',
            'género' => 'required',
            'disponible' => 'boolean',
        ]);

        $libro = Libro::findOrFail($id);

        $libro->update([
            'titulo' => $request->input('titulo'),
            'autor' => $request->input('autor'),
            'año_publicacion' => $request->input('año_publicacion'),
            'género' => $request->input('género'),
            'disponible' => $request->input('disponible', false),
        ]);

        return redirect()->route('libros.index')->with('success', 'Libro actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();

        return redirect()->route('libros.index')->with('success', 'Libro borrado exitosamente.');
    }
}
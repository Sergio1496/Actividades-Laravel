<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de libros</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>Listado de Libros</h1>
    <a href="{{ route('libros.create') }}" class="btn btn-primary">Añadir Libro</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Año de Publicación</th>
                <th>Género</th>
                <th>Disponible</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($libros as $libro)
    <tr>
        <td>{{ $libro->titulo }}</td>
        <td>{{ $libro->autor }}</td>
        <td>{{ $libro->año_publicacion }}</td>
        <td>{{ $libro->género }}</td>
        <td>{{ $libro->disponible ? 'Disponible' : 'No disponible' }}</td>
        <td>
            <a href="{{ route('libros.show', $libro->id) }}" class="btn btn-info">Ver</a>
            <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-primary">Editar</a>
            <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este libro?')">Eliminar</button>
            </form>
        </td>
    </tr>
@endforeach
        </tbody>
    </table>
</body>
</html>
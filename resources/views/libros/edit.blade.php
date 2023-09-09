<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<h1>Editar Libro</h1>
    <a href="{{ route('libros.index') }}" class="btn btn-secondary">Volver</a>
    
    <form method="POST" action="{{ route('libros.update', $libro->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" class="form-control" value="{{ $libro->titulo }}" required>
        </div>
        <div class="form-group">
            <label for="autor">Autor:</label>
            <input type="text" name="autor" class="form-control" value="{{ $libro->autor }}" required>
        </div>
        <div class="form-group">
            <label for="año_publicacion">Año de Publicación:</label>
            <input type="number" name="año_publicacion" class="form-control" value="{{ $libro->año_publicacion }}" required>
        </div>
        <div class="form-group">
            <label for="género">Género:</label>
            <input type="text" name="género" class="form-control" value="{{ $libro->género }}" required>
        </div>
        <div class="form-group">
            <label for="disponible">Disponible:</label>
            <select name="disponible" class="form-control">
                <option value="1" {{ $libro->disponible ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ !$libro->disponible ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</body>
</html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir nuevo libro</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<h1>Añadir Nuevo Libro</h1>
    <a href="{{ route('libros.index') }}" class="btn btn-secondary">Volver</a>
    
    <form method="POST" action="{{ route('libros.store') }}">
        @csrf
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="autor">Autor:</label>
            <input type="text" name="autor" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="año_publicacion">Año de Publicación:</label>
            <input type="number" name="año_publicacion" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="género">Género:</label>
            <input type="text" name="género" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="disponible">Disponible:</label>
            <select name="disponible" class="form-control">
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</body>
</html>
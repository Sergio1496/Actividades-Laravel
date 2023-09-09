<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del libro</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<h1>Detalles del Libro</h1>
    <a href="{{ route('libros.index') }}" class="btn btn-secondary">Volver</a>
    
    <div class="table">
        <strong>Título:</strong> {{ $libro->titulo }}<br>
        <strong>Autor:</strong> {{ $libro->autor }}<br>
        <strong>Año de Publicación:</strong> {{ $libro->año_publicacion }}<br>
        <strong>Género:</strong> {{ $libro->género }}<br>
        <strong>Disponible:</strong> {{ $libro->disponible ? 'Sí' : 'No' }}<br>
    </div>
</body>
</html>
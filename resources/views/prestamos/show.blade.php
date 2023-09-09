<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del préstamos</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<h1>Detalles del Préstamo</h1>
    <a href="{{ route('prestamos.index') }}" class="btn btn-secondary">Volver</a>
    
    <div>
        
        <strong>Libro:</strong> {{ $prestamo->libro->titulo }}<br>
        <strong>Fecha de Préstamo:</strong> {{ $prestamo->fecha_prestamo }}<br>
        <strong>Fecha de Devolución:</strong> {{ $prestamo->fecha_devolucion }}<br>
        <strong>Devuelto:</strong> {{ $prestamo->devuelto ? 'Sí' : 'No' }}<br>
    </div>
</body>
</html>
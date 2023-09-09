<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de préstamos</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<h1>Listado de Préstamos</h1>
    <a href="{{ route('prestamos.create') }}" class="btn btn-primary">Añadir Préstamo</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>Libro</th>
                <th>Fecha de Préstamo</th>
                <th>Fecha de Devolución</th>
                <th>Devuelto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prestamos as $prestamo)
                <tr>
                    <td>{{ $prestamo->libro->titulo }}</td>
                    <td>{{ $prestamo->fecha_prestamo }}</td>
                    <td>{{ $prestamo->fecha_devolucion }}</td>
                    <td>{{ $prestamo->devuelto ? 'Sí' : 'No' }}</td>
                    <td>
                        <a href="{{ route('prestamos.show', $prestamo->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('prestamos.finalizar', $prestamo->id) }}" class="btn btn-success">Finalizar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
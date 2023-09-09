<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Préstamo</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<h1>Finalizar Préstamo</h1>
    <a href="{{ route('prestamos.index') }}" class="btn btn-secondary">Volver</a>
    
    <form method="POST" action="{{ route('prestamos.finalizar', $prestamo->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="fecha_devolucion_real">Fecha de Devolución Real:</label>
            <input type="date" name="fecha_devolucion_real" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Finalizar Préstamo</button>
    </form>
</body>
</html>
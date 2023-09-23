@auth
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir nuevo Préstamos</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<div class="container">
    <h2>Crear Préstamo</h2>
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <form method="POST" action="{{ route('prestamos.store') }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="book_id">Libro:</label>
            <select name="book_id" class="form-control" required>
                @foreach($librosDisponibles as $libro)
                    <option value="{{ $libro->id }}">{{ $libro->titulo }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fecha_prestamo">Fecha de Préstamo:</label>
            <input type="date" name="fecha_prestamo" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fecha_devolucion">Fecha de Devolución:</label>
            <input type="date" name="fecha_devolucion" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Préstamo</button>
    </form>
</div>
</body>
</html>
@endauth
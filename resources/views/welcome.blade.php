<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Bienvenido a BAJEZA</h1>
        <p>Selecciona una opción:</p>
        <div class="btn-group">
            <a class="btn btn-primary" href="{{ route('login') }}">Iniciar Sesión</a>
            <a class="btn btn-success" href="{{ route('register') }}">Registrar Nueva Cuenta</a>
        </div>
    </div>
</body>
</html>


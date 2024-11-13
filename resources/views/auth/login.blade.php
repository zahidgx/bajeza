<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Iniciar Sesion</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" name="email" required>
    </div>
        <br>
        <div class="mb-3">
        <label for="password" class="form-label">Contraseña:</label>
        <input type="password" class="form-control" name="password" required>
        <br>
        <button type="submit" class="btn btn-primary" >Entrar</button>
        <a href="{{ url('/') }}" class="btn btn-secondary">Volver al inicio</a>
    </form>

    @if(session('error'))
        <div style="color: red; background-color: #f8d7da; padding: 10px; border-radius: 5px;">
            {{ session('error') }}
        </div>
    @endif

    <!-- Mostrar errores de validación si los hay -->
    @if ($errors->any())
        <div>{{ $errors->first() }}</div>
    @endif
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Crear Usuario</title>
</head>
<body>
    <div class="container mt-4">
    <h1>Crear Nuevo Usuario</h1>

    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required maxlength="255">
            @error('nombre')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Correo:</label>
            <input type="email"  class="form-control" name="correo" id="correo" value="{{ old('correo') }}" required>
            @error('correo')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Rol</label>
            <select id="role" name="role" required class="form-control">
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Usuario Normal</option>
            </select>
            @error('role')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Contraseña:</label>
            <input type="password" class="form-control" name="contraseña" id="contraseña" required minlength="8">
            @error('contraseña')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Confirmar Contraseña:</label>
            <input type="password" class="form-control" name="contraseña_confirmation" id="contraseña_confirmation" required minlength="8">
            @error('contraseña')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Crear Usuario</button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>






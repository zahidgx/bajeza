<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-4">
        <h1>Editar Usuario</h1>

        <!-- Formulario de edición de usuario -->
        <form action="{{ route('usuarios.update', $usuario) }}" method="POST">
            @csrf
            @method('PUT') <!-- Especifica que es una actualización -->

            <!-- Campo para el nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre', $usuario->name) }}" required>
                @error('nombre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo para el correo -->
            <div class="mb-3">
                <label for="correo" class="form-label">Correo:</label>
                <input type="email" class="form-control" name="correo" id="correo" value="{{ old('correo', $usuario->email) }}" required>
                @error('correo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Rol</label>
                <select id="role" name="role" required class="form-control">
                    <option value="admin" {{ old('role', $usuario->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ old('role', $usuario->role) == 'user' ? 'selected' : '' }}>Usuario</option>
                </select>
            </div>

            <!-- Campo para la contraseña -->
            <div class="mb-3">
                <label for="contraseña" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" name="contraseña" id="contraseña">
                <small>Deja vacío si no deseas cambiar la contraseña</small>
                @error('contraseña')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo para confirmar la contraseña -->
            <div class="mb-3">
                <label for="contraseña_confirmation" class="form-label">Confirmar Contraseña:</label>
                <input type="password" class="form-control" name="contraseña_confirmation" id="contraseña_confirmation">
                @error('contraseña')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

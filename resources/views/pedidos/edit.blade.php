<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Pedido</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Editar Pedido</h1>

        <form action="{{ route('pedidos.update', $pedido) }}" method="POST">
            @csrf
            @method('PUT') <!-- Método PUT para actualizar el recurso -->

            <div class="mb-3">
                <label for="nombre_cliente" class="form-label">Nombre del Cliente</label>
                <input type="text" class="form-control" name="nombre_cliente" id="nombre_cliente" value="{{ old('nombre_cliente', $pedido->nombre_cliente) }}" required>
            </div>
            <div class="mb-3">
                <label for="descripcion_pedido" class="form-label">Descripción del Pedido</label>
                <textarea class="form-control" name="descripcion_pedido" id="descripcion_pedido" required>{{ old('descripcion_pedido', $pedido->descripcion_pedido) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="ubicacion" class="form-label">Ubicación</label>
                <input type="text" class="form-control" name="ubicacion" id="ubicacion" value="{{ old('ubicacion', $pedido->ubicacion) }}" required>
            </div>
            <div class="mb-3">
                <label for="enviado" class="form-label">Enviado</label>
                <select class="form-control" name="enviado" id="enviado" required>
                    <option value="0" {{ old('enviado', $pedido->enviado) == 0 ? 'selected' : '' }}>No Enviado</option>
                    <option value="1" {{ old('enviado', $pedido->enviado) == 1 ? 'selected' : '' }}>Enviado</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Pedido</button>
            <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Volver a la lista</a>
        </form>
    </div>
</body>
</html>


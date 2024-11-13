<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <div class="container mt-4">
        <div class="row justify-content-between">
            <!-- Sección de Enlaces a la izquierda -->
            <div class="col-auto">
                <div class="btn-group" role="group">
                    <a class="btn btn-primary" href="/productos">Productos</a>
                    <a class="btn btn-primary" href="/usuarios">Usuarios</a>
                    <a class="btn btn-primary" href="/pedidos">Pedidos</a>
                </div>
            </div>
    
            <!-- Sección de Logout a la derecha -->
            <div class="col-auto">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>            

    <div class="container mt-4">
    <h1>Productos</h1>
    <a href="{{ route('productos.create') }}"  class="btn btn-success mb-3">Crear Nuevo Producto</a>

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>
                        <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline;" class="delete-form" id="delete-form-{{ $producto->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirmDelete({{ $producto->id }})" class="btn btn-danger">Eliminar</button>
                        </form>                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
  
<div class="d-flex justify-content-center">
    {{ $productos->links('pagination::bootstrap-4') }} 
</div>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no se puede deshacer!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('delete-form-' + id);
                    form.submit(); 
                }
            });
        }
    </script>

</body>
</html>






<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Mostrar lista de usuarios
    public function index()
    {
        $usuarios = User::paginate(1); 
        return view('usuarios.index', compact('usuarios'));  
    }

    // Mostrar formulario para crear un nuevo usuario
    public function create()
    {
        return view('usuarios.create');
    }
    public function show(string $id)
    {
        //
    }

    // Guardar un nuevo usuario
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:users,email',
            'contraseña' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,user',
        ]);

        User::create([
            'name' => $request->nombre,
            'email' => $request->correo,
            'password' => bcrypt($request->contraseña),
            'role'=> $request->role
            
        ]);

    
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente');
    }


    public function edit(User $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    // Actualizar un usuario
    public function update(Request $request, $id)
{
    $usuario = User::findOrFail($id);

    $request->validate([
        'nombre' => 'required|string|max:255',
        'correo' => 'required|email|unique:users,email,' . $usuario->id,
        'contraseña' => 'nullable|string|min:8|confirmed',
        'role' => 'required|in:admin,user', 
    ]);

    // Actualizar usuario
    $usuario->name = $request->nombre;
    $usuario->email = $request->correo;
    if ($request->contraseña) {
        $usuario->password = bcrypt($request->contraseña);
    }

    $usuario->role = $request->role;
    $usuario->save();

    return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente');
}

    // Eliminar un usuario
    public function destroy(User $usuario)
    {
        $usuario->delete();  // Elimina el usuario de la base de datos

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado con éxito');
    }
}


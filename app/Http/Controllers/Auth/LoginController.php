<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');  // Vista del formulario de login
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/productos');  // Redirige al dashboard después de iniciar sesión
        }

        return back()->withErrors(['email' => 'Las credenciales son incorrectas.']);
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Desloguea al usuario

        // Redirige a la página de bienvenida (welcome.blade.php)
        return redirect('/'); // Puedes cambiar esto a route('welcome') si prefieres usar una ruta con nombre
    }
}




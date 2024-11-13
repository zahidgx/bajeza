<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');  
        }

        return $next($request);
    }
    public function logout(Request $request)
    {
        Auth::logout(); 

       
        return redirect('login')->with('error', 'No eres permisos para ver, Inicia sesion como administrador!!');; 
    }
}


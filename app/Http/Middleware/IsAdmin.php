<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->role->name == 'Admin') {
            return $next($request);
        }

        return redirect('profile')->with('error', 'Sin permisos de Administrador');
    }
}

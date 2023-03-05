<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSessionExpiration
{
    public function handle(Request $request, Closure $next)
    {
        $sessionExpireTime = config('session.lifetime') * 60; // tiempo de expiración de la sesión en segundos
        $lastActivityTime = session('last_activity_time');

        if ($lastActivityTime && (time() - $lastActivityTime) > $sessionExpireTime) {
            Auth::logout();
            session()->flash('error', 'Su sesión ha expirado. Por favor inicie sesión nuevamente.');
            return redirect()->route('login');
        }

        session(['last_activity_time' => time()]); // actualizar la hora de la última actividad del usuario
        return $next($request);
    }
}


<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$role)
    {
        if(!Auth::check()){
            if(in_array('guest', $role)){
                return $next($request);
            }
            return redirect()->route('login')->with('Silahkan login terlebih dahulu');
        }

        $user = Auth::user();

        if (in_array($user->role, $role)) {
            return $next($request);
        }

        abort(403, 'Akses ditolak. Kamu tidak memiliki izin untuk membuka halaman ini.');
    }
}

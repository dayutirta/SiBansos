<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Cek_login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $roles
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();

        // Ubah $roles menjadi array
        $roles = explode(',', $roles);

        // Periksa apakah id_level pengguna ada dalam array $roles
        if (in_array((int)$user->id_level, $roles)) {
            return $next($request);
        }

        return redirect('login')->with('error', 'Anda tidak memiliki akses');
    }
}
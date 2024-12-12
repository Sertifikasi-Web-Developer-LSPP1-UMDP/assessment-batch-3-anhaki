<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = Auth::user()->roles;
        $isMahasiswa = Auth::user()->is_mahasiswa;
        // $isMahasiswa = Auth::user()->is_mahasiswa();

        if ($userRole == 'user') {
            if (!$isMahasiswa) {
                return redirect('/pendaftaran');
            }

            return redirect('/');
        }

        if ($userRole == 'admin') {
            // if (!$isMahasiswa) {
            //     return redirect('/pendaftaran');
            // }

            return $next($request);
        }


        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role();
        $userStatus = Auth::user()->status();
        $isMahasiswa = Auth::user()->is_mahasiswa();

        if ($userRole === 'user') {
            if ($userStatus === 'unverified') {
                return redirect()->route('user.verify');
            }
    
            if ($userStatus === 'verified') {
                if (!$isMahasiswa) {
                    return redirect()->route('pendaftaran');
                }
    
                return redirect()->route('dashboard');
            }
        }
    
        if($userRole === 'admin'){
            return $next($request);
        }
        
        return $next($request);
    }
}

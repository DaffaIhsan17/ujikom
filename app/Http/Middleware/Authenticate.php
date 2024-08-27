<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        // if (!auth()->guard('siswa')->check()) {
        //     // If not authenticated, redirect to the login page
        //     return redirect()->route('login');
        // }

        // If authenticated, proceed with the request
        return $next($request);
    }
}

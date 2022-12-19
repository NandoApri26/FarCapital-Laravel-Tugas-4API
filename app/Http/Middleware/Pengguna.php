<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class Pengguna
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \Closure(\Iluminate\Http\Reuest);
     * (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     *
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->level == 'pengguna') {
            return $next($request);
        } else {
            return redirect('/login_pengguna');
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class User
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
        if (Auth::check() && Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.index');

        }elseif (Auth::check() && Auth::user()->role == 'admin') {
            return redirect()->route('admin.index');

        }elseif (Auth::check() && Auth::user()->role == 'petugas') {
            return redirect()->route('petugas.index');

        }elseif (Auth::check() && Auth::user()->role == 'user') {
            return $next($request);
        }else {
            return redirect()->route('login');
        }
    }
}

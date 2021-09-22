<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
       if (Auth::check()) {
            if (Auth::user() && Auth::user()->role_id <=2) {
                return $next($request);
            }
            return redirect('admin/login');
        }
    }
}

<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class AuthorMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user() && Auth::user()->role_id <=4) {
                return $next($request);
            }
            return redirect('/login');
        }
    }
}

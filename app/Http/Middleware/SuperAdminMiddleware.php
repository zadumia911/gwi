<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class SuperAdminMiddleware
{
    
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user() && Auth::user()->role_id ==1) {
                return $next($request);
            }
            return redirect('/admin/login');
        }
    }
}

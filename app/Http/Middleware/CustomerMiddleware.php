<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('email','password') && session()->get('loginStatus') == 'customer') {
            return $next($request);
        } else if (session()->has('email','password')) {
            return redirect('/admin/home/dashboard');
        }
        return redirect('/Auth/sign-up');
    }
}

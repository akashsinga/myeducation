<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class StudentMiddleware
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if (Auth::user()->type=='admin') {
            return redirect('/admin');
        }
        if (Auth::user()->type=='student') {
            return $next($request);
        }
        if (Auth::user()->type=='faculty') {
            return redirect('/faculty');
        }
    }
}

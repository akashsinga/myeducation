<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class FacultyMiddleware
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
            return redirect('/student');
        }
        if (Auth::user()->type=='faculty') {
            return $next($request);
        }
    }
}

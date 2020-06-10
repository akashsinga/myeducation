<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class AdminMiddleware
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
            return $next($request);
        }
        if (Auth::user()->type=='student') {
            return redirect('/student');
        }
        if (Auth::user()->type=='faculty') {
            return redirect('/faculty');
        }
    }
}

<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckName
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->name === null) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;



class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       
        
        if (auth()->check() && auth()->user()->usertype === 'admin') {
            return $next($request);
        }

        // If not admin, redirect to home
        return redirect('/home')->with('error', 'You do not have admin access.');
    }
    }


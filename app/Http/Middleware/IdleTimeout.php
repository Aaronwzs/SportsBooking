<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class IdleTimeout
{
    public function handle($request, Closure $next)
    {
    if (Auth::check()) {
        // Check if the session has expired
        $lastActivity = Session::get('last_activity', time());
        $timeout = config('session.lifetime') * 60; // Convert minutes to seconds

        if ((time() - $lastActivity) > $timeout) {
            Auth::logout();
            Session::flush();
            return redirect('/login')->with('message', 'Your session has expired due to inactivity.');
        }

        // Update last activity timestamp
        Session::put('last_activity', time());
    }

    return $next($request);
}
}

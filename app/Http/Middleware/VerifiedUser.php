<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class VerifiedUser
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
        if(Auth::check())
            return $next($request);
        return redirect()->route('auth.login')->with('authMsg', 'Login or Register to start bookings');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

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
        if(!Auth::check())
            return redirect()->route('auth.login')->with('authMsg', 'Signin or Signup to access that page');
            
        if($request->user()->adminer == 0)
            return redirect()->route('home')->with('authMsg', 'You dont have permission to access that page');
        return $next($request);
    }
}

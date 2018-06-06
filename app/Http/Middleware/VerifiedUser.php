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
        if(Auth::check()){
            if(Auth::user()->verify != 1){
                return redirect()->route('home')->with('authMsg', 'Your account has not been verified, check your mail to verify your account.');
            }else {
                return $next($request);
            }
        }else{
            return redirect()->route('auth.login')->with('authMsg', 'Login or Register to start bookings');
        }        
    }
}

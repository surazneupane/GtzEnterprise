<?php

namespace App\Http\Middleware;

use Closure;
use Socialite;

class CustomerMiddleware
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

        if($request->user()==null||!($request->user()->hasRole('Customer')))
        {
        return Socialite::driver('facebook')->redirect();
           

        }
        return $next($request);
    }
}

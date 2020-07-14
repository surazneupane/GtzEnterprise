<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class LoggedIn
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
{
if(Auth::user()->hasRole('Admin'))
{
    return redirect()->intended(route('admindashboard'));
}
else if(Auth::user()->hasRole('Vendor'))
{

        return redirect()->intended(route('vendordashboard'));
}


}

        return $next($request);
    }
}

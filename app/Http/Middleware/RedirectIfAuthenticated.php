<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if (Auth::guard($guard)->check()) {
            foreach (Auth::user()->roles as $role) {
                if ($role->name == 'admin') {
                    return redirect(RouteServiceProvider::ADMINHOME);
                } elseif ($role->name == 'staff') {
                    return redirect(RouteServiceProvider::EMPLOYEEHOME);
                }
            }
            // return redirect(RouteServiceProvider::HOME);

        }

        return $next($request);
    }
}

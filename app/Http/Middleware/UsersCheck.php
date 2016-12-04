<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class UsersCheck
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
        if(Auth::user()->userType === 1){
          return redirect()->route('admin.dashboard');
        }elseif(Auth::user()->userType === 0 || empty(Auth::user()->email) || is_null(Auth::user()->email)){
          return redirect()->route('register.info');
        } else {
          if(Auth::user()->userType === 2){
            return $next($request);
          } elseif (Auth::user()->userType === 3 || Auth::user()->userType === 0) {
            return $next($request);
          }
        }
        return redirect()->route('welcome');
    }
}

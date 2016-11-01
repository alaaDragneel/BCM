<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class UsersCompanyCheck
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
        if(Auth::user()->userType !== 3){
          return redirect()->route('welcome');
        }
        return $next($request);
    }
}

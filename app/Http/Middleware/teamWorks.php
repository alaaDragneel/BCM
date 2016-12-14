<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class teamWorks
{
  /**
  * Handle an incoming request.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \Closure  $next
  * @return mixed
  */
  public function handle($request, Closure $next, $guard = 'teamWork')
  {
    if (Auth::guard($guard)->guest()) {
      return redirect()->guest('teamwork/login');
    }
    return $next($request);
  }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminAccess
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
       if(Auth::user()->role['roleName']=='admin')
       {
        return $next($request);
       }
       return redirect('/')->with('error','Access denied!');
    }
}

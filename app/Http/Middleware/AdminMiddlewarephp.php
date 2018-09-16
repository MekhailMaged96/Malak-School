<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Support\Facades\Response;
class AdminMiddlewarephp
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
        if(!Auth::check()){

            return redirect('/login');
        }
        if(Auth::user()->is_admin==0){

          return redirect('/home');
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        // session()->flush();
        if(!session("admin")){
           return redirect("/login")->withErrors([
               "admin"=>"非法的请求!"
           ]); 
        }
        return $next($request);
    }
}

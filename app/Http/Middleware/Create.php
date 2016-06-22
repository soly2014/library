<?php

namespace App\Http\Middleware;

use Closure;

class Create
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$superadmin,$admin)
    {
        $user = $request->user();
        return($user->hasRole($superadmin) || $user->hasRole($admin))? $next($request) : response(View('errors.401'),401) ;
    }
}

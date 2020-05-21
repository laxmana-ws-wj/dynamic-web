<?php

namespace App\Http\Middleware;

use Closure;

class CheckActivateRoute
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
        if ($request->user() && $request->user()->plan_status == 'Active')
        {
            return $next($request);
        }
        return redirect('/activate');

    }
}

<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class UnsubscribedUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   //echo $request->user()->plan_status;die;
        if ($request->user() && $request->user()->plan_status != 'Active')
        {
            return redirect('/activate');
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Act_log;

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

            return redirect('/home');
        }
        /*
        $log = new Act_log;
        $log->user_id = Auth::id();
        $log->ip      = \Request::ip();
        $log->log     = '登入';
        $log->save();
        */
        return $next($request);
    }
}

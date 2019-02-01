<?php

namespace App\Http\Middleware;

use Closure;

class CekHakAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $hak = null)
    {
        if(\Auth::user()->hak && in_array($hak,json_decode(\Auth::user()->hak))){
            return $next($request);
        }
        // if (Auth::guard($guard)->check()) {
        //     if (Auth::guard($guard)->user()->isAdmin()) {
        //         return $next($request);
        //     }
        // }

        flash()->error('Access Denied');

        return ($request->ajax() || $request->wantsJson()) ? response('Unauthorized.', 401) : redirect(route('dashboard::index'));
    }
}

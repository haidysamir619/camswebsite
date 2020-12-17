<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;//
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()) return abort(404);
        elseif($request->ajax() && auth()->user()->type<1)
        {
            return response()->json(['failed'=> __('not authorized')]);
        }
        elseif(auth()->user()->type<1) return abort(404);
        return $next($request);

    }
}

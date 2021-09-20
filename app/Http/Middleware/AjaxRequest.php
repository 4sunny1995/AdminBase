<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;

class AjaxRequest
{
    /**
     * Handle an incoming request.
     *
     * @param null|string ...$guards
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (!$request->ajax()) {
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}

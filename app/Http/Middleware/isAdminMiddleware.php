<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdminMiddleware
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

        // If no authorization or auth is admin
        if ( !auth()->check() || !auth()->user() ){

            // redirect to 403
            abort(403);

        }

        return $next($request);
    }
}

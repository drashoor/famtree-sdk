<?php

namespace FamtreeV3\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class RequestToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        abort_if(!Session::has('oauth'), 403, "Unauthorized to access famtree api");

        return $next($request);
    }
}

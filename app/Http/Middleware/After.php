<?php

namespace App\Http\Middleware;

use Closure;

class After
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
        $response =  $next($request);

        // do someting after laravel handled requrest

        //...
        return $response;
    }
}

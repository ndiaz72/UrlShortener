<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;

class CacheResponse
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
        // Define a cache key based on the route and query parameters
        $key = $request->url();

        // Attempt to get the response from cache
        if (Cache::has($key)) {
            return response(Cache::get($key));
        }

        // Get the response from the next middleware/controller
        $response = $next($request);

        // Store the response in cache for 60 minutes
        Cache::put($key, $response->getContent(), 60);

        return $response;
    }
}
